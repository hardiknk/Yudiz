<?php

use App\Http\Controllers\FacadeController;
use Illuminate\Contracts\Cache\Factory;

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


Route::get('/contract', function (Factory $cache) {
    // return view('welcome');
    $cache->put('msg', "hii hardik using the cache contract");
    dd($cache->get('msg'));
});

//facade is provide the non static method to provide the interace 
//non static method we can access using the facade 
Route::get('/facade', [FacadeController::class,'index']);
Route::get('/custom_facade', [FacadeController::class,'customFacade']);

