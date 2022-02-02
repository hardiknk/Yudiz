<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
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

//one to one relationshiop demo 
Route::get('getUserDetails',[ UserController::class,'getUserDetails']);


//one to many relationshiop demo 
Route::get('getUserPhone',[ UserController::class,'getUserPhone']);

//belong to relationship
Route::get('getCompanyUser',[CompanyController::class,'index']);


//many to many relationship 
// start the add singer intermideate table 
Route::get('add_singer',[SingerController::class,'add_singer']);
//display the singer name according to song
Route::get('show_song_by_singer',[SongController::class,'show_song']);
//display the song name according to singer name
Route::get('show_singer_by_song',[SingerController::class,'show_singer']);
//many to many relationship end