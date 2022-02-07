<?php

namespace App\Listeners;

use App\Events\SomeOneCheckedProfile;
use App\Jobs\SendProfileCheckedMailJob;
use App\Mail\ProfileCheckedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProfileCheckedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // echo '<pre>'; print_r("some one check profile listner"); exit;
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SomeOneCheckedProfile  $event
     * @return void
     */
    public function handle(SomeOneCheckedProfile $event)
    {
        echo '<pre>'; print_r("hii hardik"); exit;
        // echo '<pre>'; print_r($this->event); exit;
        // echo "hiiih haridk handle listner"; exit;
        // $delay = now()->addSeconds(5);
        // Mail::to($event->user->email)->send(new ProfileCheckedMail($this->user));
        // SendProfileCheckedMailJob::dispatch($event->user)->delay(now()->addSeconds(5));

    }
}
