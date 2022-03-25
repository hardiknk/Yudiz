<?php

namespace App\Listeners;

use App\Events\SomeOneCheckedProfile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestTwoListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // echo '<pre>'; print_r("test two listner call"); exit;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SomeOneCheckedProfile  $event
     * @return void
     */
    public function handle(SomeOneCheckedProfile $event)
    {
        //
    }
}
