<?php

namespace App\Providers;

use App\Events\PodcastProcessed;
use App\Events\SomeOneCheckedProfile;
use App\Listeners\SendProfileCheckedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        // SomeOneCheckedProfile::class =>[
        //     SendProfileCheckedNotification::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    //in this boot method we are manually register the events 
    public function boot()
    {
        //manually register the event  working done 
        // Event::listen(
        //     SomeOneCheckedProfile::class,
        //     [SendProfileCheckedNotification::class, 'handle'],

        // );

        //quable anonymous event listner pending
        Event::listen(queueable(function (SomeOneCheckedProfile $event) {
           
        }));
        
    }
}
