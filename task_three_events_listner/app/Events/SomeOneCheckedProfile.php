<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SomeOneCheckedProfile
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public User $user;
    //in web php file direct $user comes for construct 
    public function __construct(User $user)
    {
        // echo '<pre>'; print_r("event call some check profile"); exit;
        // echo '<pre>'; print_r($user); exit;
        $this->user = $user;
        // dd($user);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Bro adcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
