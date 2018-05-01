<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SubmitRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $message;
    public $id;
    public function __construct($message)
    {
       $this->message = $message;
       $this->id = $message['id'];
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello! '.$this->message['manager']['full_name'])//how can we access the full_name
            ->line("You received new FRD from ".$this->message['creator']['full_name'])
            ->line('Thank you for using our application!')
            ->action('View FRD', url('/displayRequest/'.$this->id));
    }
}
