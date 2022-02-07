<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestOneListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // echo '<pre>'; print_r("test one listner call"); exit;
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
