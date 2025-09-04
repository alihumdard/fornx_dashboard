<?php

namespace App\Models;
use App\Models\User;
use App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['type','creator_id'];

    public function users() {
        return $this->morphToMany(User::class, 'user', 'conversation_user')->withPivot('user_type');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    // Conversation.php
    public function participants()
    {
        return $this->hasMany(ConversationUser::class);
    }

    public function getResolvedParticipantsAttribute()
{
    // Collect IDs by type
    $userIds   = $this->participants->where('user_type', \App\Models\User::class)->pluck('user_id');
    $clientIds = $this->participants->where('user_type', \App\Models\Client::class)->pluck('user_id');
    $teamIds   = $this->participants->where('user_type', \App\Models\Team::class)->pluck('user_id');

    // Eager load actual models
    $users   = \App\Models\User::whereIn('id', $userIds)->get()->keyBy('id');
    $clients = \App\Models\Client::whereIn('id', $clientIds)->get()->keyBy('id');
    $teams   = \App\Models\Team::whereIn('id', $teamIds)->get()->keyBy('id');

    return $this->participants->map(function($p) use ($users, $clients, $teams) {
        $name = match($p->user_type) {
            \App\Models\User::class   => $users[$p->user_id]->name ?? 'Unknown',
            \App\Models\Client::class => $clients[$p->user_id]->name ?? 'Unknown',
            \App\Models\Team::class   => $teams[$p->user_id]->name ?? 'Unknown',
        };

        return [
            'id' => $p->user_id,
            'name' => $name,
            'user_type' => $p->user_type,
        ];
    });
}





}
