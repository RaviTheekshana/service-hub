<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => []
]);

mount(function () {
    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
});

$markAsRead = function ($notification_id) {
    $notification = auth()
        ->user()
        ->notifications()
        ->where('id', $notification_id)
        ->first();

    $notification->markAsRead();

    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
};

?>
<div>
    <div class="relative" x-data="{ open: false }">
        <style>
            .ping {
                position: absolute;
                height: 100%;
                width: 100%;
                border-radius: 100%;
                background-color: rgba(56, 189, 248, 0.93);
                animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
            }

            @keyframes ping {
                0% {
                    transform: scale(1);
                    opacity: 1;
                }
                75% {
                    transform: scale(2);
                    opacity: 0;
                }
                100% {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        </style>
            <!-- Bell Icon Button -->
        <button @click="open = !open" class="relative inline-block text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-9" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <!-- Blue Dot with Notification Count -->
            <span class="absolute top-0 right-0 flex items-center justify-center px-1.5 py-0.5 rounded-full bg-sky-500 text-white text-sm/[13px] font-bold min-w-[1rem]">
                {{ $notifications->count() }}
                <span class="ping"></span>
            <span class="relative inline-flex rounded-full h-full w-full bg-sky-500"></span>
        </span>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" @click.away="open = false"
             class="absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg z-20"
             x-cloak>
            <!-- Dropdown Header -->
            <div class="border-b border-gray-200 bg-gray-200 px-4 py-2 flex items-center justify-between">
                <span class="text-m font-semibold text-gray-700">Notifications</span>
                <!-- Close Button in Header -->
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <!-- Notification List -->
            <div>
                <ul class="py-1">
                    @forelse($notifications as $notification)
                        <li class="{{ !$notification->read_at ? 'bg-gray-100' : '' }} flex items-center space-x-3 px-4 py-2 hover:bg-green-200">
                            <a href="{{ $notification->data['action'] }}"
                               class="flex-1 text-sm text-gray-700">
                                {{ $notification->data['message'] }}
                            </a>
                            <button type="button" wire:click="markAsRead('{{ $notification->id }}')" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </li>
                    @empty
                        <!-- Empty State Message -->
                        <li class="px-4 py-2 text-sm text-gray-500">No notifications</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
