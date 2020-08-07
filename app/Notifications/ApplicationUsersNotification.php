<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationUsersNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $message;
    private $imagePath;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $imagePath)
    {
        //
        $this->message = $message;
        $this->imagePath = $imagePath;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello!')
            ->subject('A message from company admin')
            ->markdown()
            ->line($this->message)
            ->from(env('MAIL_FROM_ADDRESS'))
            ->line('Thank you for using our application!');
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
            //
        ];
    }
}
