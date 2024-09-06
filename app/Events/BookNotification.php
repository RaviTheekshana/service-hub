<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;

class BookNotification extends Notification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $broadcastData;
    public $message;
    public $action;

    /**
     * Create a new notification instance.
     *
//     * @param string $message
//     * @param string|null $action
     * @param array $broadcastData
     */
    public function __construct($broadcastData)
    {
        $this->broadcastData = $broadcastData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast', 'mail'];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return $this->broadcastData;
    }

    public function toDatabase($notifiable): array
    {
        return [
            'message' => $this->broadcastData['message'],
            'action' => $this->broadcastData['action'],
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('ServiceHub Booking Notification')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your booking has been created successfully!')
            ->line('You are receiving this email because we received a booking request for your email address.')
            ->action('Notification Action', url('/dashboard'))
            ->line('Thank you for using ServiceHub!');
    }

    /**
     * The channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('booking');
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'book.notification';
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
        ];
    }
}
