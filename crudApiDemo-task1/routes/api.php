<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\CommentController;
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
    Route::post('deleteUser', [UserController::class, 'destroy'])->name('deleteUser');
    Route::post('updateUser', [UserController::class, 'update'])->name('updateUser');
    Route::get('getUserInformation', [UserController::class, 'show'])->name('getUserInformation');
    Route::post('userLogout', [AuthController::class, 'logout'])->name('userLogout');
    Route::post('changePassword', [AuthController::class, 'changePassword'])->name('changePassword');

    //post releted route 
    Route::post('createPost', [PostController::class, 'createPost'])->name('createPost');
    Route::get('getAllPost', [PostController::class, 'getAllPost'])->name('getAllPost');
    Route::post('updatePost/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::post('deletePost/{id}', [PostController::class, 'deletePost'])->name('deletePost');

    //comment releted routes
    Route::get('getAllComments', [CommentController::class, 'getAllComments'])->name('getAllComments');
    Route::post('createComment', [CommentController::class, 'createComment'])->name('createComment');
    Route::post('deleteComment/{id}', [CommentController::class, 'deleteComment'])->name('deleteComment');
    Route::post('updateComment/{id}', [CommentController::class, 'updateComment'])->name('updateComment');
});

Route::post('userLogin', [AuthController::class, 'userLogin'])->name('userLogin');
Route::post('createUser', [UserController::class, 'store'])->name('createUser');
Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');


// Route::apiResource('users', UserController::class);