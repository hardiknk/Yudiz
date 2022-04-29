<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AdminAuth\ForgotPasswordController;
use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\AdminAuth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformativeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
// Route::get('news-details', [AdminNewsController::class, 'newsDetails']);
Route::get('news', [NewsController::class, 'news']);
Route::get('contact-us', [InformativeController::class, 'contactUs'])->name('contact_us');
Route::get('privacy-policy', [InformativeController::class, 'privacyPolicy'])->name('privacy_policy');
Route::get('cookie-policy', [InformativeController::class, 'cookiePolicy'])->name('cookie_policy');


Auth::routes();

//news website routes 
Route::get('/test', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('login', [LoginController::class, 'login']);
  Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

  Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.request');
  Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.email');
  Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.reset');
  Route::get('/password/reset/{token}/{email?}', [ResetPasswordController::class, 'showResetForm']);
});
