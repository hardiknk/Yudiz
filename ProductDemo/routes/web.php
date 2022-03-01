<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RateLimitController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestTwoController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
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


Route::get('all_prod', [ProductController::class, 'index'])->name('all_prod');
Route::middleware('auth')->group(function () {
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

//understand the controller 
Route::get('/testC', TestController::class);

//this is the resource  contoller not write the index,create,update,destory method is take
// the method all by defullt and if we want to see so php artisan route:list

Route::resource('testTwo', TestTwoController::class)->missing(function (Request $request) {
    return Redirect::route('all_prod');
});

//
//resource demo make on the  student 
Route::resource('student', StudentController::class)->missing(function (Request $request) {
    return Redirect::route('student.index');
});


//rate limiting demo start 
//here after 4,1 here 4=>how many time enter 1=> minutes after 1 minutes automaticaly reset
//and it is display the 429 TOO MANY REQUESTS

//using the throlltel middware 
Route::get('rate_limit', [RateLimitController::class, 'index'])->middleware('throttle:4,1');

//custome usig rate limiters 
Route::get('rate_limit_attempt', [RateLimitController::class, 'attemptMethod']);
Route::get('rate_limit_to_many_attempt', [RateLimitController::class, 'toManyAttempt']);

//determining-limiter-availability
Route::get('limiter_availablity', [RateLimitController::class, 'limitAvailablity']);


//custome using the routeServiceProviders 
Route::middleware(['throttle:customer_route'])->group(function () {
    Route::get('customer', [RateLimitController::class, 'customeRoute'])->name('customer');

    // Route::get('vip_customer', [RateLimitController::class, 'vipCustomer'])->name('vipCustomer');
});

//backup systtem  using the appservice providers 
Route::middleware(['throttle:backups'])->group(function () {
    Route::get('vip_customer', [RateLimitController::class, 'vipCustomer'])->name('vipCustomer');
});



require __DIR__ . '/auth.php';
