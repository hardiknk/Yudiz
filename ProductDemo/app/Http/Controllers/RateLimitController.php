<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RateLimitController extends Controller
{
    //
    public function index()
    {
        return "Rate limiter call using the throttle middleware";
    }

    public function attemptMethod()
    {
        $user = User::find(1);
        // dd($user);
        //here this is exicute the one mintes only 5 times after it is reset

        $executed = RateLimiter::attempt(
            'send-message:' . $user->id,
            $perMinute = 5,
            function () {
                return "Hello Message is sent ";
            }
        );

        // dd($executed);
        if (!$executed) {
            return 'Too many messages sent!';
        }
    }

    //not working 
    public function toManyAttempt()
    {
        $user = User::find(1);


        // if (RateLimiter::tooManyAttempts('send-message:' . $user->id, $perMinute = 5)) {
        //     return 'Too many attempts!';
        // }


        //remaining method here hit method is increase the attempt by one 
        // $remaining = RateLimiter::remaining('send-message:' . $user->id, $perMinute = 5);
        // // dump($remaining);
        // if ($remaining) {
        //     RateLimiter::hit('send-message:' . $user->id);
        //     echo '<pre>';
        //     print_r("Message send ");
        //     exit;
        // }




    }

    //not working 
    public function limitAvailablity(Request $request)
    {
        $user = User::find(1);
        // // limiter availiblity 
        // $limit = RateLimiter::tooManyAttempts('send-message:' . $user->id, $perMinute = 5);
        // // dump($limit);
        // if ($limit) {
        //     $seconds = RateLimiter::availableIn('send-message:' . $user->id);
        //     // dump($seconds) . "seconds ";
        //     return 'You may try again in ' . $seconds . ' seconds.';
        //     // exit;
        // } 
        // // else {
        // //     RateLimiter::clear('send-message:' . $user->id);
        // // }


        //define the custome rate limit by using the global routeserviceproviders 
        // echo "hiihardik ";


        dd($request->user()->vip_customer);
    }




    //checking the rate limiting by the RouteServiceProviders
    public function customeRoute()
    {
        echo "in controller custome route call ";
    }


    public function vipCustomer()
    {
        echo "vip customer route is call";
    }
}
