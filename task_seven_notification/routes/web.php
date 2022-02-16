<?php

use App\Http\Controllers\NotificationController;
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

Route::get('send_notificaion', [NotificationController::class, 'send_notificaion'])->name('send_notificaion');

Route::get('send_sms', [NotificationController::class, 'sendSms'])->name('send_sms');

Route::get('slack_notification', [NotificationController::class, 'sendSlack'])->name('slack_notification');

Route::get('custom_notification', [NotificationController::class, 'customChannel'])->name('custom_notification');


Route::get('brod_notification', [NotificationController::class, 'brodNotification'])->name('brod_notification');

