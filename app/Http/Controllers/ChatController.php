<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    /**
     * Show the main chat view.
     *
     * @return View
     */
    public function show(): View
    {
        $currentUserId = 1;

        return view('pages.chat.index', compact('currentUserId'));
    }

    /**
     * Fetch all conversations for the authenticated user.
     * This will be used to populate the conversation list on the left side of the UI.
     *
     * @return JsonResponse
     */
    public function getConversations(): JsonResponse
    {
        $conversations = [
            (object)['id' => 1, 'name' => 'Elmer Laverty', 'last_message' => 'Haha oh man!', 'last_message_time' => '10:30 AM'],
            (object)['id' => 2, 'name' => 'Jane Doe', 'last_message' => 'Did you see the latest project updates?', 'last_message_time' => '9:15 AM'],
            (object)['id' => 3, 'name' => 'John Smith', 'last_message' => 'Not yet, I\'ll check them out now.', 'last_message_time' => 'Yesterday'],
        ];

        return response()->json($conversations);
    }

    /**
     * Fetch messages for a specific conversation.
     *
     * @param  int  $conversationId
     * @return JsonResponse
     */
    public function getMessages(int $conversationId): JsonResponse
    {
        $messages = [
            (object)['user_id' => 2, 'message' => 'Hey! How are you?', 'created_at' => now()],
            (object)['user_id' => 1, 'message' => 'I\'m good, what about you? 🙂', 'created_at' => now()],
            (object)['user_id' => 2, 'message' => 'Haha oh man!', 'created_at' => now()],
            (object)['user_id' => 1, 'message' => 'Did you see the latest project updates?', 'created_at' => now()],
            (object)['user_id' => 2, 'message' => 'Not yet, I\'ll check them out now.', 'created_at' => now()],
        ];

        return response()->json($messages);
    }

    /**
     * Store a new message submitted by the user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $request->validate([
            'conversation_id' => 'required|integer',
            'sender_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        return response()->json(['status' => 'success']);
    }
}
