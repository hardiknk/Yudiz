<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Channels\VonageSmsChannel;
use Illuminate\Notifications\Facades\Vonage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\VonageChannelServiceProvider;


class VongasNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // dd("controll call");
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // dd($notifiable);
        // dd("noitiable call");
        // return ['vonage'];
        // dd($notifiable->prefers_sms);
        // dd($notifiable->prefers_sms);
        // dd($notifiable->prefers_sms ? ['vonage'] : ['mail', 'database']);
        return $notifiable->prefers_sms ? ['vonage'] : ['mail', 'database'];

        // return $notifiable->prefers_sms ? ['mail'] : ['mail', 'database']; //so mail call

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        dd("to mail calls");
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        dd("to mail calls");
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
        dd("hii to array call");
        return [
            //
        ];
    }

    public function toVonage($notifiable)
    {
        
        dd("vonage call");
        return (new VonageMessage())
        ->content('Your SMS message content');
    }
}
