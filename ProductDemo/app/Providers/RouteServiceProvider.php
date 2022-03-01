<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\RateLimited;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {

        Route::resourceVerbs([
            'create' => 'createlocal',

        ]);


        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // echo "hii call the configure route "; exit;
        // RateLimiter::for('api', function (Request $request) {
        //     return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        // });


        //custome rate limit for the route 
        // RateLimiter::for('customer_route', function (Request $request) {
        //     // echo "rate limit all";
        //     // exit;
        //     return Limit::perMinute(5);

        //     //custome response redirect 
        //     // return Limit::perMinute(5)->response(function () {
        //     //     return response('Custom response when two time refresh the pages...', 429);
        //     // });
        // });


        //for the vip customer route call
        RateLimiter::for('customer_route', function (Request $request) {
            

            // return ($request->user()->vip_customer) ? Limit::none() : Limit::perMinute(3)->by($request->ip());
            // return Limit::perMinute(5);
        });
    }
}
