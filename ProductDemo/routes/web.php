<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RazorpayController;
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
    //single products details 
    Route::get('product_details', [ProductController::class, 'productDetails'])->name('product_details');

    //razorpay payment links 
    Route::post('buy_p', [ProductController::class, 'buyProductF'])->name('buy_p');
    Route::get('paymentView', [ProductController::class, 'paymentView'])->name('paymentView');

    //add the items in cart 
    Route::post('add_to_cart', [CartController::class, 'AddToCart'])->name('add_to_cart');
    //view items in cart 
    Route::get('view_cart', [CartController::class, 'viewCart'])->name('view_cart');

    //remove from the cart
    Route::get('remove_from_cart', [CartController::class, 'removeCart'])->name('remove_from_cart');
    //add extra product from the cart 
    // add_one_product
    Route::get('add_one_product', [CartController::class, 'addOneMore'])->name('add_one_product');
    Route::get('remove_one_product', [CartController::class, 'removeOneMore'])->name('remove_one_product');

    Route::get('remove_from_cart', [CartController::class, 'removeCart'])->name('remove_from_cart');

    //get the product price 
    Route::get('get_price', [ProductController::class, 'getProductPrice'])->name('get_price');
    
});

//understand the razorpay payment gateway 
Route::get('razorpay', [RazorpayController::class, 'index'])->name('razorpay');


require __DIR__ . '/auth.php';
