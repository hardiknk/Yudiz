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
    Route::post('getUserInformation', [UserController::class, 'show'])->name('getUserInformation');
    Route::post('userLogout', [AuthController::class, 'logout'])->name('userLogout');
    Route::post('changePassword', [AuthController::class, 'changePassword'])->name('changePassword');

    //post releted route 
    Route::post('createPost', [PostController::class, 'createPost'])->name('createPost');
    Route::post('getAllPost', [PostController::class, 'getAllPost'])->name('getAllPost');
    Route::post('updatePost/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::post('deletePost/{id}', [PostController::class, 'deletePost'])->name('deletePost');

    //comment releted routes
    Route::post('getCommentByPost/{id}', [CommentController::class, 'getAllComments'])->name('getCommentByPost');
    Route::post('createComment', [CommentController::class, 'createComment'])->name('createComment');
    Route::post('deleteComment/{id}', [CommentController::class, 'deleteComment'])->name('deleteComment');
    Route::post('updateComment/{id}', [CommentController::class, 'updateComment'])->name('updateComment');
});

// Route::get('getCommentByPost/{id}', [CommentController::class, 'getAllComments'])->name('getCommentByPost');

Route::post('userLogin', [AuthController::class, 'userLogin'])->name('userLogin');
Route::post('createUser', [UserController::class, 'registerUserByOne'])->name('createUser');
// ->middleware('throttle:1,1');

//one minutes only one user register for particular ip address
Route::middleware(['throttle:ip_address'])->group(function () {
    Route::post('registerUser', [UserController::class, 'registerUserByOne'])->name('registerUser');
});


Route::post('forgotPassword', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
// ->middleware('throttle:1,1');

Route::post('resetPassword', [AuthController::class, 'resetPassword'])->name('resetPassword');

Route::get('getIpAddress', [AuthController::class, 'getIpAddress'])->name('getIpAddress');


// Route::apiResource('users', UserController::class);