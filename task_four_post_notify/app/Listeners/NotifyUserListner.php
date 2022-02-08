<?php

namespace App\Listeners;

use App\Events\NotifyUserEvent;
use App\Jobs\SendNotificationJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserListner implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
        //
        // echo '<pre>'; print_r("hii hardik listner call"); exit;
        // $this->user = $user;
        // $this->post_name = $post_name;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NotifyUserEvent  $event
     * @return void
     */
    public function handle(NotifyUserEvent $event)
    {
        //here job name to dispatch and send mail to the user and the dalay is 5 second
        SendNotificationJob::dispatch($event->user,$event->post_name)->delay(now()->addSeconds(3));
        

    }
}
