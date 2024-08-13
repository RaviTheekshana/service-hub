<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sender_user_id',
        'is_read',
        'chat_id',
        'message_content',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }
}
