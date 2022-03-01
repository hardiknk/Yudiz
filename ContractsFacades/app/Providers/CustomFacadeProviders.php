<?php

namespace App\Providers;
// use App;
use Illuminate\Support\Facades\App;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CustomFacadeProviders extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('test', function () {
            return new \App\Facade_custom\Custome;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
