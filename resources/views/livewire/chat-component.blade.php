<div>
    <div class="flex flex-col h-screen">
        <!-- Chat Messages -->
        <div id="chat-container" class="flex-1 overflow-y-auto p-4" wire:poll.500ms="refreshMessages">
            @foreach($messages->reverse() as $message)
                <div class="flex {{ $message->sender_user_id === Auth::id() ? 'justify-end' : '' }} mb-4">
                    <div class="flex items-center">
                        @if($message->sender_user_id !== Auth::id())
                            <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $message->sender->name }}" alt="User Avatar" class="w-8 h-8 rounded-full">
                            </div>
                        @endif
                        <div class="flex max-w-96 {{ $message->sender_user_id === Auth::id() ? 'bg-indigo-500 text-white' : 'bg-white text-gray-700' }} rounded-lg p-3 gap-3">
                            <p>{{ $message->message_content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        <!-- Chat Input -->
        <div class="bg-white border-t border-gray-300 p-4">
            <form wire:submit.prevent="sendMessage" class="flex items-center">
                <input type="text" wire:model="messageContent" placeholder="Type a message..." class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500" required>
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
            </form>
        </div>
    </div>
