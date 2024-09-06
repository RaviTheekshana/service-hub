<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\BookingNotification;
use Livewire\Component;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $chat;
    public $messageContent = '';

    protected $listeners = ['messageReceived' => 'refreshMessages'];

    public function mount(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function sendMessage()
    {
        $message = $this->chat->messages()->create([
            'sender_user_id' => Auth::id(),
            'message_content' => $this->messageContent,
        ]);
        event(new BookingNotification([
            'user_id' => $this->chat->customer_id,
            'message' => 'You have a new message from ' . auth()->user()->name,
            'service_time' => 'Just Now',
        ]));
        $user = User::findOrFail($this->chat->customer_id);
        $user->notify(new BookingNotification([
            'message' => 'You have a new message from ' . auth()->user()->name,
            'action' => route('chat.show', $this->chat),
        ]));

        $this->messageContent = '';
        // Emit an event to refresh messages for all users
    }

    public function refreshMessages()
    {
        // No need to do anything, the messages will refresh automatically
    }

    public function render()
    {
        $messages = $this->chat->messages()->latest()->get();

        return view('livewire.chat-component', ['messages' => $messages]);
    }
}

