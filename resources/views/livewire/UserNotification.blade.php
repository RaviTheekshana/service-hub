<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => []
]);
mount(function () {
    $this->loadNotifications();
});

$loadNotifications = function () {
    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
};

$markAsRead = function ($notification_id = null) {
    if ($notification_id) {
        // Mark a specific notification as read
        auth()
            ->user()
            ->notifications()
            ->where('id', $notification_id)
            ->update(['read_at' => now()]);
    } else {
        // Mark all notifications as read
        auth()
            ->user()
            ->notifications()
            ->update(['read_at' => now()]);
    }
    $this->notifications = auth()
        ->user()
        ->notifications()
        ->where('read_at', null)
        ->get();
};

?>

<div x-data="{
    init(){
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('c379edfdce44785732d0', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('booking');
        channel.bind('book.notification', function(data) {
            @this.call('loadNotifications');
        });
    }
}">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <!-- Bell Icon Button -->
            <button class="relative inline-block text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-9 mt-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <!-- Blue Dot with Notification Count -->
                <span class="absolute top-0 right-0 mt-0.5 flex items-center justify-center px-1.5 py-0.5 rounded-full bg-sky-500 text-white text-sm/[13px] font-bold min-w-[1rem]">
                {{ $notifications->count() }}
                <span class="ping"></span>
            <span class="relative inline-flex rounded-full h-full w-full bg-sky-500"></span>
        </span>
            </button>
        </x-slot>

        <!-- Dropdown Menu -->
        <x-slot name="content">
            <div class="absolute right-0 w-64 bg-white rounded-md shadow-2xl z-20">
                <!-- Dropdown Header -->
                <div class="border-b border-gray-200 bg-gray-200 px-4 py-2 flex items-center justify-between">
                    <span class="text-m font-semibold text-gray-700">Notifications</span>
                    <!-- Close Button in Header -->
                    <button wire:click="markAsRead" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
        </x-slot>
    </x-dropdown>
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
</div>
