<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrapFive();

        RateLimiter::for('backups', function ($job) {
            return $job->user()->vip_customer
                ? Limit::none()
                : Limit::perMinute(3)->by($job->user()->id);

            //extra
            // dd($job->user());
            // return Limit::perMinute(3)->by($job->user());
        });
    }

    // public function middleware()
    // {
    //     // return [new RateLimited('backups')];
    // }
}
