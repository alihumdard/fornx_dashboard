<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Meeting;
use Carbon\Carbon;

class MeetingController extends Controller
{
    // Create a new meeting (returns JSON)
    public function store(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|integer',
            'title' => 'nullable|string|max:255',
        ]);

        // create a unique room name
        $roomName = 'chat-' . $request->conversation_id . '-' . Str::random(6) . '-' . time();

        $meetingUrl = "https://meet.jit.si/{$roomName}";

        $meeting = Meeting::create([
            'conversation_id' => $request->conversation_id,
            'started_by' => $request->user()->id,
            'room_name' => $roomName,
            'meeting_url' => $meetingUrl,
            'title' => $request->title,
            'started_at' => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'meeting' => $meeting,
        ]);
    }

    // Optional: list meetings for a conversation
    public function index($conversationId)
    {
        $meetings = Meeting::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['meetings' => $meetings]);
    }
}
