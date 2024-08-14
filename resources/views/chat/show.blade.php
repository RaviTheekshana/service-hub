<x-layout>
{{--    <div class="flex h-screen overflow-hidden bg-gray-100">--}}

{{--        <!-- Sidebar -->--}}
{{--        <div class="w-1/4 bg-white border-r border-gray-300 flex flex-col">--}}
{{--            <!-- Sidebar Header -->--}}
{{--            <header class="p-4 border-b border-gray-300 bg-indigo-600 flex items-center text-white">--}}
{{--                <h1 class="font-bold text-xl">Chat Web</h1>--}}
{{--            </header>--}}

{{--            <!-- Contact List -->--}}
{{--            <div class="flex-1 overflow-y-auto p-4 space-y-4">--}}
{{--                @foreach($chats as $primary_chat)--}}
{{--                    <a href="{{ route('chat.show', $primary_chat->id) }}" class="block">--}}
{{--                        <div class="flex items-center p-3 rounded-lg hover:bg-indigo-100 transition">--}}
{{--                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-3 overflow-hidden">--}}
{{--                                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $primary_chat->provider->name }}" alt="{{ $primary_chat->provider->name }}" class="w-full h-full object-cover">--}}
{{--                            </div>--}}
{{--                            <div class="flex-1">--}}
{{--                                <h2 class="text-lg font-semibold text-gray-800">--}}
{{--                                    @if(auth()->user()->role === 'service_provider')--}}
{{--                                        {{ $primary_chat->customer->name }}--}}
{{--                                    @else--}}
{{--                                        {{ $primary_chat->provider->name }}--}}
{{--                                    @endif--}}
{{--                                </h2>--}}
{{--                                <p class="text-gray-600 truncate text-sm">{{ $primary_chat->messages->first()?->message_content }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
    <!-- component -->
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
                <div class="flex flex-row items-center justify-center h-12 w-full">
                    <div
                        class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                    </div>
                    <div class="ml-2 font-bold text-2xl">QuickChat</div>
                </div>
                <div
                    class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg"
                >
                    <div class="h-20 w-20 rounded-full border overflow-hidden">
                        <img
                            src="https://avatars3.githubusercontent.com/u/2763884?s=128"
                            alt="Avatar"
                            class="h-full w-full"
                        />
                    </div>
                    <div class="text-sm font-semibold mt-2">Aminos Co.</div>
                    <div class="text-xs text-gray-500">Lead UI/UX Designer</div>
                    <div class="flex flex-row items-center mt-3">
                        <div
                            class="flex flex-col justify-center h-4 w-8 bg-indigo-500 rounded-full"
                        >
                            <div class="h-3 w-3 bg-white rounded-full self-end mr-1"></div>
                        </div>
                        <div class="leading-none ml-1 text-xs">Active</div>
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row items-center justify-between text-xs">
                        <span class="font-bold">Active Conversations</span>
                        <span
                            class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                        >4</span
                        >
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto">
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full"
                            >
                                H
                            </div>
                            <div class="ml-2 text-sm font-semibold">Henry Boyd</div>
                        </button>
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-gray-200 rounded-full"
                            >
                                M
                            </div>
                            <div class="ml-2 text-sm font-semibold">Marta Curtis</div>
                            <div
                                class="flex items-center justify-center ml-auto text-xs text-white bg-red-500 h-4 w-4 rounded leading-none"
                            >
                                2
                            </div>
                        </button>
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-orange-200 rounded-full"
                            >
                                P
                            </div>
                            <div class="ml-2 text-sm font-semibold">Philip Tucker</div>
                        </button>
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-pink-200 rounded-full"
                            >
                                C
                            </div>
                            <div class="ml-2 text-sm font-semibold">Christine Reid</div>
                        </button>
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-purple-200 rounded-full"
                            >
                                J
                            </div>
                            <div class="ml-2 text-sm font-semibold">Jerry Guzman</div>
                        </button>
                    </div>
                </div>
            </div>
        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col bg-gray-50">
            <!-- Chat Header -->
            <header class="bg-white p-4 border-b border-gray-300 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">{{ $chat->provider->name }}</h1>
                <p class="text-gray-600">Chat with {{ $chat->customer->name }}</p>
            </header>

            <!-- Include Livewire Component -->
            @livewire('chat-component', ['chat' => $chat])
        </div>
    </div>
</div>
</x-layout>
