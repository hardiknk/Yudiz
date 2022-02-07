<?php

use App\Events\SomeOneCheckedProfile;
use App\Http\Controllers\EventListerController;
use App\Jobs\SendTestMailJob;
use App\Mail\ProfileCheckedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
  
    //que and jobs working done
    // without the que
    // dispatch(function (){
    //     Mail::raw('Hi, Welcome Hardik!', function ($message) {
    //         $message->to("kanzariyahardik8511@gmail.com")
    //             ->subject("Welcome To  The Yudiz");
    //     });
      
    // })->delay(now()->addSeconds(2));
    // echo "mail sent";

    // using the job method first global dispatch method
    // dispatch(new SendTestMailJob())->delay(now()->addSeconds(5));
    // echo "mail sent";

    //using the second metod note:both method we are use
        // SendTestMailJob::dispatch($user)->delay(now()->addSeconds(5));

// });


Route::get('sendEamil',[EventListerController::class,'sendEamil']);