<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware(['api'])->group(function(){});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');
    Route::put('update_user/{id}', [UserController::class, 'update'])->name('update_user');
    Route::get('get_user_info/{id}', [UserController::class, 'show'])->name('get_user_info');
    Route::post('user_logout', [AuthController::class, 'logout'])->name('user_logout');
    Route::post('change_password', [AuthController::class, 'changePassword'])->name('change_password');
});

Route::get('user_login', [AuthController::class, 'userLogin'])->name('user_login');
Route::post('create_user', [UserController::class, 'store'])->name('create_user');
Route::post('forgot_password', [AuthController::class, 'forgotPassword'])->name('forgot_password');
Route::post('reset_password', [AuthController::class, 'resetPassword'])->name('reset_password');


// Route::apiResource('users', UserController::class);