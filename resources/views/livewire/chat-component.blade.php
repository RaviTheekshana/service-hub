{{--Chat Area--}}
<div class="flex flex-col flex-auto h-full w-100 p-6">
    <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
        <div class="flex flex-col h-full overflow-x-auto mb-4">
            <div class="flex flex-col h-full">
                <div class="grid grid-cols-12 gap-y-2" wire:poll.500ms="refreshMessages">
                    @foreach($messages->reverse() as $message)
                        @if($message->sender_user_id === auth()->id())
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $message->sender->name }}" alt="User Avatar" class="w-8 h-8 rounded-full">
                                    </div>
                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                        <div>{{ $message->message_content }}</div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $message->sender->name }}" alt="User Avatar" class="w-8 h-8 rounded-full">
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>{{ $message->message_content }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Chat Input -->
        <div x-data="{ messageContent: ''}" class="flex flex-row items-center h-16 rounded-xl bg-white w-full pr-4">
            <form @submit.prevent="$wire.sendMessage().then(() => { messageContent = '' })" class="flex flex-row items-center w-full">
            <div class="flex-grow ml-4">
                <div class="relative w-full">
                    <input x-model="messageContent" wire:model.defer="messageContent" type="text" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" placeholder="Type a message..."/>
                </div>
            </div>
            <div class="ml-4">
                <button type="submit" class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                    <span>Send</span>
                    <span class="ml-2">
                  <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                  </svg>
                </span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
