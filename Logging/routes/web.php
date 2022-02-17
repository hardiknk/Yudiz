<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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

Route::get('/', function () {
    // Log::debug("log Debug first time call");
    // Log::alert("log Debug locking the file ");
    // Log::emergency("log Debug first time call");

    //all example of the loggin system 
    // Log::emergency(" the log is emergency");
    // Log::alert(" the log is alert");
    // Log::critical(" the log is critical");
    // Log::error(" the log is error");
    // Log::warning(" the log is warning");
    // Log::notice(" the log is notice");
    // Log::info(" the log is info");
    // Log::debug(" the log is debug");

    // :::pending
    // $requestId = (string)Str::uuid();    
    // Log::withContext([
    //     'request-id' => $requestId
    // ]);

    //writing the log in specific channel
    // Log::channel('single')->info('Log For The Specific Channel');

    // Log::stack(['single', 'slack'])->info('Using the two channle log use the stack method');


    //om demand log start means we can create over custom immediatly logs
    // Log::build([
    //     'driver' => 'single',
    //     'path' => storage_path('logs/custom_on_demand.log'),
    // ])->info('Something happened! for on demand notification');
    //on demand log end 


    //using the custom challal 

    // Log::debug("Hii hardik custom log by tap array formatter");
    // Log::emergency("Hii hardik custom log by tap array formatter");

    // Log::emergency("Hii hardik k");

    // Log::channel('browser')->info('browser call');
    // Log::channel('browser')->info('browser call');

    // Log::channel('slack')->info("Hello from the hardik slack notification");

    return view('welcome');
});


Route::get('log', [LogController::class, 'log']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
