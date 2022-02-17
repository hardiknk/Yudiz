<?php

use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
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


//login route 
Route::get('login', [UserLoginController::class, 'loginForm'])->name('login');
Route::post('check_user_loging', [UserLoginController::class, 'checkUser'])->name('check_user_loging');


//register route 
Route::get('add_new_user', [UserRegisterController::class, 'userForm'])->name('add_new_user');
Route::post('user_register', [UserRegisterController::class, 'saveUser'])->name('user_register');


Route::middleware('isAdmin')->group(function () {
    Route::get('is_admin', [UserLoginController::class, 'adminUser'])->name('adminUser');
    // Route::view('admin_test', 'admin.test');
    Route::view('admin_test', 'admin.test')->withoutMiddleware('isAdmin');
});

Route::get('user', [UserLoginController::class, 'normal_user']);

Route::view('register', 'user.register');
