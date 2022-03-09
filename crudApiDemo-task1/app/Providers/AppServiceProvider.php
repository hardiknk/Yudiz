<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        //
        // RateLimiter::for('customer_route', function (Request $request) {
        //     return Limit::perMinute(1);
        // });

        RateLimiter::for('ip_address', function (Request $request) {
            // $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
            // $ip = $_SERVER['REMOTE_ADDR'];
            // echo ("My public IP: " . $ip);
            // exit;
            // $ip = $request->ip();
            // dd($ip);
            // echo $_SERVER['REMOTE_ADDR'];
            // exit;


            return Limit::perMinute(1)->by($request->ip())->response(function () {
                // return response('Your return message', 429);
                $arr = [
                    'data' => null,
                    'meta' => [
                        "status" =>  Response::HTTP_BAD_REQUEST,
                        "message" => "You Can Register Only One User Per One Minutes",
                    ],
                ];
                return response()->json($arr);
            });
        });
    }
}
