<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\Conversation;
use App\Models\Message;
use App\Events\MessageSent;
use App\Models\User;
use App\Models\ConversationUser;


class ChatController extends Controller
{

    public function view(): View
    {
        return view('pages.chat.index'); // resources/views/chat/index.blade.php
    }

    public function index(Request $request, $type)
    {
       $authId   = auth()->id();
        $authType = get_class(auth()->user());

        $conversations = Conversation::where('type', $type)
            ->whereHas('participants', function($q) use ($authId, $authType) {
                $q->where('user_id', $authId)
                ->where('user_type', $authType);
            })
            ->get()
            ->map(function ($c) use ($authId) {
                $c->participants = $c->resolved_participants
                    ->filter(fn($p) => !($p['id'] === auth()->id() && $p['user_type'] === get_class(auth()->user())))
                    ->values();

                      $c->unread_count = $c->messages()
                ->whereNull('read_at')
                ->where('sender_id', '!=', $authId)
                ->count();

                return $c;
            });


            // Fetch entities for new chats
            switch ($type) {
                case 'users':
                    $entities = \App\Models\User::where('id', '!=', auth()->id())->get(['id', 'name']);
                    break;

                case 'clients':
                    $entities = \App\Models\Client::all(['id', 'name']);
                    break;
                case 'teams':
                    $entities = \App\Models\Team::all(['id', 'name']);
                    break;
                default:
                    $entities = collect();
                    break;
            }

            return response()->json([
                'conversations' => $conversations,
                'entities'      => $entities,
                'total_unread'  => $conversations->sum('unread_count'), // 👈 category total

            ]);
    }

    // Get messages for a conversation
    public function show($id) {
        $messages = Message::where('conversation_id', $id)->with('sender')->get();
        return response()->json($messages);
    }

    // Send a new message
    public function store(Request $request, $conversationId) {
        $message = Message::create([
            'conversation_id' => $conversationId,
            'sender_id' => auth()->id(),
            'sender_type' => get_class(auth()->user()),
            'body' => $request->body,
            'read_at' => null, // New field initialized to null
        ]);

        broadcast(new MessageSent($message));

        return response()->json($message);
    }

    public function start(Request $request)
    {
        $request->validate([
            'entity_id' => 'required|integer',
            'type'      => 'required|string|in:clients,users,teams',
        ]);

        $entityId   = $request->entity_id;
        $type       = $request->type;
        $authId     = auth()->id();
        $authType   = get_class(auth()->user());

        $entityClass = match ($type) {
            'users'   => \App\Models\User::class,
            'clients' => \App\Models\Client::class,
            'teams'   => \App\Models\Team::class,
        };

        // Find conversation with exactly these two participants
        $conversation = Conversation::where('type', $type)
            ->whereHas('participants', fn($q) => $q->whereIn('user_id', [$authId, $entityId]))
            ->get()
            ->first(fn($conv) => $conv->participants->pluck('user_id')->sort()->values()->toArray() === collect([$authId, $entityId])->sort()->values()->toArray());

        // If conversation does not exist, create it
        if (!$conversation) {
            $conversation = Conversation::create([
                'type' => $type,
                'creator_id' => $authId,
            ]);

            // Add participants safely (prevent duplicates)
            $participants = [
                ['user_id' => $authId, 'user_type' => $authType],
                ['user_id' => $entityId, 'user_type' => $entityClass]
            ];

            foreach ($participants as $p) {
                \App\Models\ConversationUser::firstOrCreate([
                    'conversation_id' => $conversation->id,
                    'user_id' => $p['user_id'],
                    'user_type' => $p['user_type']
                ]);
            }
        }

        // Resolve participants with real names
        $conversation->participants = $conversation->resolved_participants;

        // Fetch messages
        $messages = \App\Models\Message::where('conversation_id', $conversation->id)
            ->with('sender')
            ->get();

        return response()->json([
            'conversation' => $conversation,
            'messages'     => $messages,
        ]);
    }

    public function markRead(Request $request, $conversationId)
    {
        $authId = auth()->id();

        if ($request->has('message_id')) {
            // mark only this message
            \App\Models\Message::where('id', $request->message_id)
                ->where('conversation_id', $conversationId)
                ->whereNull('read_at')
                ->where('sender_id', '!=', $authId)
                ->update(['read_at' => now()]);
        } else {
            // mark all unread messages in this conversation
            \App\Models\Message::where('conversation_id', $conversationId)
                ->whereNull('read_at')
                ->where('sender_id', '!=', $authId)
                ->update(['read_at' => now()]);
        }

        return response()->json(['status' => 'ok']);
    }


    public function getConversations($type)
    {
        $user = auth()->user();

        $conversations = Conversation::with(['participants', 'messages'])
            ->whereHas('participants', function($q) use ($user) {
                $q->where('id', $user->id);
            })
            ->withCount(['messages as unread_count' => function ($q) use ($user) {
                $q->whereNull('read_at')
                ->where('sender_id', '!=', $user->id);
            }])
            ->get();

        $categoryUnread = $conversations->sum('unread_count');

        return response()->json([
            'conversations' => $conversations,
            'category_unread_count' => $categoryUnread
        ]);
    }

    public function sendAudioMessage(Request $request, $conversationId)
    {
        try {
            $request->validate([
                'audio' => 'required|file|mimes:webm,ogg,mp3,wav|max:10240'
            ]);


            $path = $request->file('audio')->store('chat-audios', 'public');

            $message = Message::create([
                'conversation_id' => $conversationId,
                'sender_id' => auth()->id(),
                'sender_type' => get_class(auth()->user()), // 👈 add this
                'body' => '',
                'audio_path' => $path,
            ]);

            broadcast(new MessageSent($message))->toOthers();

            return response()->json($message);
        } catch (\Exception $e) {
            \Log::error('Audio upload error: '.$e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendDocument(Request $request, $id)
    {
        $request->validate([
            'document' => 'required|file|max:10240', // max 10MB
        ]);

        $path = $request->file('document')->store('chat/documents', 'public');

        $message = \App\Models\Message::create([
            'conversation_id' => $id,
            'sender_id'       => auth()->id(),
            'sender_type' => get_class(auth()->user()), // 👈 add this
            'audio_path' => null,

            'document_path'   => $path,
            'body'            => '',
        ]);

        broadcast(new \App\Events\MessageSent($message))->toOthers();

        return response()->json($message);
    }









}
