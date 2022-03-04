<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\PostController;
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
    Route::delete('deleteUser', [UserController::class, 'destroy'])->name('deleteUser');
    Route::put('updateUser', [UserController::class, 'update'])->name('updateUser');
    Route::get('getUserInformation', [UserController::class, 'show'])->name('getUserInformation');
    Route::post('userLogout', [AuthController::class, 'logout'])->name('userLogout');
    Route::post('changePassword', [AuthController::class, 'changePassword'])->name('changePassword');

    //post releted route 
    Route::post('createPost', [PostController::class, 'createPost'])->name('createPost');
    Route::get('getAllPost', [PostController::class, 'getAllPost'])->name('getAllPost');
    Route::patch('updatePost/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('deletePost/{id}', [PostController::class, 'deletePost'])->name('deletePost');
});

Route::post('userLogin', [AuthController::class, 'userLogin'])->name('userLogin');
Route::post('createUser', [UserController::class, 'store'])->name('createUser');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');


// Route::apiResource('users', UserController::class);