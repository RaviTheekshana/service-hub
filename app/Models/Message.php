<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sender_user_Id',
        'receiver_user_Id',
        'message_content',
    ];
    public function service_provider()
    {
        return $this
            ->belongsTo(User::class, 'receiver_user_Id')
            ->where('role', 'service_provider');
    }
    public function user()
    {
        return $this
            ->belongsTo(User::class, 'sender_user_Id')
            ->where('role', 'user');
    }
}
