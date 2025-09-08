<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'conversation_id',
        'started_by',
        'room_name',
        'meeting_url',
        'title',
        'started_at',
    ];
}
