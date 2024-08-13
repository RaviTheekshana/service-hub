<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {

        //if the guest user tries to access the chat
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role === 'service_provider') {

            $service_providers = (new User())
                ->where('role', 'user')
                ->whereHas('chats', function ($query) {
                    $query->where('provider_id', auth()->id());
                })
                ->get();

        } else {

            $service_providers = (new User())->where('role', 'service_provider')->get();

        }

        return view('chat.index', [
            'service_providers' => $service_providers
        ]);
    }

    public function show(Request $request, $id)
    {
        // load the chat ID
        $chat = (new Chat())->find($id);

        if (auth()->user()->role === 'service_provider') {
            // check if the chat belong to the current user
            if ($chat->provider_id !== auth()->id()) {
                abort(403);
            }
            $chats = (new Chat())
                ->where('provider_id', auth()->id())
                ->with('messages')
                ->get();
        } else {
            // check if the chat belong to the current user
            if ($chat->customer_id !== auth()->id()) {
                abort(403);
            }
            $chats = (new Chat())
                ->where('customer_id', auth()->id())
                ->with('messages')
                ->get();
        }

        // load the messages for the chat
        $chat->load('messages');

        return view('chat.show', [
            'chat' => $chat,
            'chats' => $chats
        ]);
    }

    public function store(Request $request)
    {

        // validate the request and check if a provider_id is present
        $request->validate([
            'user_id' => 'required'
        ]);

        if (auth()->user()->role === 'service_provider') {

            // check if the current user already have a chat with the customer
            // if yes, return the chat
            $chat = (new Chat())
                ->newQuery()
                ->where([
                    'customer_id' => (int)$request->user_id,
                    'provider_id' => auth()->id(),
                    'status' => true
                ])
                ->first();

        } else {
            // check if the current user already have a chat with the provider
            // if yes, return the chat
            $chat = (new Chat())
                ->newQuery()
                ->firstOrCreate([
                    'customer_id' => auth()->id(),
                    'provider_id' => (int)$request->user_id,
                    'status' => true
                ]);
        }


        return redirect()->route('chat.show', $chat->id);
    }

    public function update(Request $request, Chat $chat)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $chat->messages()->create([
            'sender_user_id' => auth()->id(),
            'message_content' => $request->message,
            'is_read' => false
        ]);

        return redirect()->route('chat.show', $chat->id);
    }

    public function messages(Chat $chat)
    {
        return $chat->messages;
    }
}
