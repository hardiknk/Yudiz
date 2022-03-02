<?php

use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//all user data 
Route::get('get_user_data', [UserController::class, 'getUser'])->name('get_user_data');

//get single user data also include the whene and whenMerge Condition 
Route::get('get_single/{id}', [UserController::class, 'getSingle'])->name('get_single');

//pagination 
Route::get('get_user_data_pagination', [UserController::class, 'getPaginate'])->name('get_user_data_pagination');

//reletionship data loaded 
Route::get('get_reletion', [UserController::class, 'getReletion'])->name('get_reletion');

//add the meta data 
Route::get('add_meta', [UserController::class, 'addMetaData'])->name('add_meta');

//Resource Responses
Route::get('add_response', [UserController::class, 'addResponse'])->name('add_response');


//Conditional Pivot Information
Route::get('pivot_info', [UserController::class, 'pivotInfo'])->name('pivot_info');