<?php

use App\Http\Controllers\CompanyController;
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