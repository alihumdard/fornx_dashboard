<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationUser extends Model
{
    use HasFactory;

    protected $table = 'conversation_user';

    protected $fillable = ['conversation_id', 'user_id', 'user_type'];

    // This will load the actual model: User, Client, or Team
    public function userable()
    {
        return $this->morphTo(__FUNCTION__, 'user_type', 'user_id');
    }

    public function user()
{
    return $this->morphTo();
}


}
