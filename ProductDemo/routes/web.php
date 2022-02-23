<?php

use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('all_prod', [ProductController::class, 'index'])->name('all_prod');
    Route::post('buy_product', [ProductController::class, 'buyProduct'])->name('buy_product');
    
    //razorpay payment links 
    Route::post('buy_p', [ProductController::class, 'buyProductF'])->name('buy_p');
    Route::get('paymentView', [ProductController::class, 'paymentView'])->name('paymentView');
});

Route::get('razorpay', function () {
    return view('razorpay.index');
});
require __DIR__ . '/auth.php';
