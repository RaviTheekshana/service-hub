<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => 'Your booking has been created successfully!',
            'action' => url('/'),
        ];
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
