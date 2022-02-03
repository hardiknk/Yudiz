<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\ShopController;
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


Route::get('getCountryWithCity',[CountryController::class,'getCountryWithCity']);
Route::get('getShopNameWithCountry',[ShopController::class,'getShopNameWithCountry']);