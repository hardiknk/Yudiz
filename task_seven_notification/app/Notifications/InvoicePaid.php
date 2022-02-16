<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// class InvoicePaid extends Notification implements ShouldQueue
class InvoicePaid extends Notification
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
        // dd("hiii hardik constructure call");
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
        // dd($notifiable);
        return (new MailMessage)
            // ->error() only button will be red action button
            ->greeting('Hello! Greetings Of The Day !!')
            ->line('Send Notificaiton Using Via Mail')
            ->action('Notification Action', url('/'))
            // ->subject("send mail when attach the file") //working 
            // ->attachFromStorage('public/text.txt') // not working ::pending
            // ->attachData($notifiable->email, 'request.txt', ['mime' => 'text/plain']) //working done
            ->line('Thank you for using our application!');

        // for passing the view file working done 
        // return (new MailMessage)->view(
        //     'email_template',['user_data' => $notifiable]
        // );

        //also we are use ther  ->error() 

        //customize the sender ->from('barrett@example.com', 'Barrett Blair')
        //customize the subject  ->subject('Notification Subject') by defaule Invoice Paid
        //customize the mailer  ->mailer('postmark')

        //if attach the file  ->attach('/path/to/file');
        //if attach the file pass the second argument as array  ->attach('/path/to/file', [
        // 'as' => 'name.pdf',
        // 'mime' => 'application/pdf',
        // ]);



    }

    //customize the reciepient
    // public function routeNotificationForMail($notification)
    // {
    //     // Return email address only...
    //     return $this->email_address;

    //     // Return email address and name...
    //     return [$this->email_address => $this->name];
    // }

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

    //check the que notification will send or not ?
    // public function shouldSend($notifiable, $channel)
    // {
    //     return $this->invoice->isPaid();
    // }
}
