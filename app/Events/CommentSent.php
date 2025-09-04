<?php

namespace App\Events;

use App\Models\ProjectComment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;

    public function __construct(ProjectComment $comment)
    {
        $this->comment = $comment->load('user'); // Eager load the user relationship
    }

    public function broadcastOn()
    {
        return new Channel('projects.' . $this->comment->project_id);
    }
}