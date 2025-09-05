<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{conversationId}', function ($user, $conversationId) {
    // Add debugging
    \Log::info("Checking channel access for user {$user->id} on conversation {$conversationId}");
    
    $hasAccess = \App\Models\ConversationUser::where('conversation_id', $conversationId)
        ->where('user_id', $user->id)
        ->exists();
    
    \Log::info("Access granted: " . ($hasAccess ? 'YES' : 'NO'));
    
    return $hasAccess;
});