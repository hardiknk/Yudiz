<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
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
    return view('welcome');
});

//newsletter route 
Route::get('news_latter',[SubscriptionController::class,'news_latter'])->name('news_latter');
Route::post('subscribe',[SubscriptionController::class,'subscribe'])->name('subscribe');

//unsubscribe news latter 
Route::get('unsubscribe/{email?}',[SubscriptionController::class,'unsubscribe'])->name('unsubscribe')->middleware('signed');

//post controller route 
Route::get('add_post',[PostController::class,'index'])->name('add_post');
Route::post('submit_post',[PostController::class,'addPost'])->name('submit_post');