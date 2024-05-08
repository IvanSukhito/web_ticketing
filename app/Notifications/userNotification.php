<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class userNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

     private $acara;

    public function __construct($acara)
    {
        //
        $this->event = $acara;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
            'name' => $this->event->name,
            'lokasi' => $this->event->lokasi,
            'waktu' => $this->event->waktu,
            'title' => 'Event Uptodated',
            'message' => 'Jangan Sampai Ketinggan Event'.$this->event->name.'Bertempat di'.$this->event->lokasi.'Pukul '.$this->event->waktu
        ];
    }
}
