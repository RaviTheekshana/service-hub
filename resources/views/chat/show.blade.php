<x-layout/>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight lg:pt-28">--}}
{{--            Chat with {{ $chat->customer->name }} and {{ $chat->provider->name }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <!-- component -->
    <div class="flex h-screen overflow-hidden lg:pt-24" x-data="messageBox">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white border-r border-gray-300">
            <!-- Sidebar Header -->
            <header class="p-4 border-b border-gray-300 flex justify-between items-center text-white">
                <h1 class="ml-2 font-bold text-3xl">Chat Web</h1>
                <p class="text-black ml-2 font-semibold text-xl">Chat with {{ $chat->customer->name }} and {{ $chat->provider->name }}</p>
            </header>

            <!-- Contact List -->
            <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
                @foreach($chats as $primary_chat)
                    <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                            <img
                                src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $primary_chat->provider->name }}&font=Lato"
                                alt="{{ $primary_chat->provider->name }}"
                                class="w-12 h-12 rounded-full">
                        </div>
                        <div class="flex-1">
                            <a href="{{ route('chat.show', $primary_chat->id) }}">
                                <h2 class="text-lg font-semibold">
                                    @if(auth()->user()->role === 'service_provider')
                                        {{ $primary_chat->customer->name }}
                                    @else
                                        {{ $primary_chat->provider->name }}
                                    @endif
                                </h2>
                                <p class="text-gray-600">{{ $primary_chat->messages->first()?->message_content }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold">
                    {{ $chat->provider->name }}
                </h1>
            </header>

            <!-- Chat Messages -->
            <div class="h-screen overflow-y-auto p-4 pb-36">

                @foreach($chat->messages as $message)

                    @if($message->sender_user_id === auth()->id())
                        <!-- Outgoing Message -->
                        <div class="flex justify-end mb-4 cursor-pointer">
                            <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                                <p>{{ $message->message_content }}</p>
                            </div>
                            <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                                <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text={{ $message->sender->name }}&font=Lato"
                                     alt="My Avatar"
                                     class="w-8 h-8 rounded-full">
                            </div>
                        </div>
                    @else
                        <!-- Incoming Message -->
                        <div class="flex mb-4 cursor-pointer">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text={{ $message->sender->name }}&font=Lato" alt="User Avatar"
                                     class="w-8 h-8 rounded-full">
                            </div>
                            <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                                <p class="text-gray-700">{{ $message->message_content }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Chat Input -->
            <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-3/4">
                <div class="flex items-center">
                    <form action="{{ route('chat.update', $chat->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" placeholder="Type a message..."
                               name="message"
                               class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500"
                               required>
                        <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2" type="submit">Send</button>
                    </form>
                </div>
            </footer>
        </div>
    </div>
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
                <div class="flex flex-row items-center justify-between text-xs mt-6">
                    <span class="font-bold">Archivied</span>
                    <span
                        class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                    >7</span
                    >
                </div>
                <div class="flex flex-col space-y-1 mt-4 -mx-2">
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
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-auto h-full p-6">
            <div
                class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
            >
                <div class="flex flex-col h-full overflow-x-auto mb-4">
                    <div class="flex flex-col h-full">
                        <div class="grid grid-cols-12 gap-y-2">
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>Hey How are you today?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Vel ipsa commodi illum saepe numquam maxime
                                            asperiores voluptate sit, minima perspiciatis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>I'm ok what about you?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>Lorem ipsum dolor sit amet !</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                        </div>
                                        <div
                                            class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500"
                                        >
                                            Seen
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Perspiciatis, in.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                                    >
                                        A
                                    </div>
                                    <div
                                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                                    >
                                        <div class="flex flex-row items-center">
                                            <button
                                                class="flex items-center justify-center bg-indigo-600 hover:bg-indigo-800 rounded-full h-8 w-10"
                                            >
                                                <svg
                                                    class="w-6 h-6 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                                                    ></path>
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    ></path>
                                                </svg>
                                            </button>
                                            <div class="flex flex-row items-center space-x-px ml-4">
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-4 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-10 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-10 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-12 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-10 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-6 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-5 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-4 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-3 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-10 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-10 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-1 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-1 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-8 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-2 w-1 bg-gray-500 rounded-lg"></div>
                                                <div class="h-4 w-1 bg-gray-500 rounded-lg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
                >
                    <div>
                        <button
                            class="flex items-center justify-center text-gray-400 hover:text-gray-600"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                ></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input
                                type="text"
                                class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                            />
                            <button
                                class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600"
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
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ml-4">
                        <button
                            class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0"
                        >
                            <span>Send</span>
                            <span class="ml-2">
                  <svg
                      class="w-4 h-4 transform rotate-45 -mt-px"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                    ></path>
                  </svg>
                </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('messageBox', () => ({
                messages : [],
                init() {
                    this.getMessages();

                    // setInterval(() => {
                    //    window.location.reload()
                    // }, 5000)
                },
                getMessages(){
                    // send a request to /chat/{chat_id}/messages
                    // get the messages and update the message array
                    fetch(`/chat/{{ $chat->id }}/messages`)
                        .then(response => response.json())
                        .then(data => {
                            this.messages = data
                        })
                }}))
        })
    </script>
<x-footer/>
