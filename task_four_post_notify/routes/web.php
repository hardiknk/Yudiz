<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifyUserPostController;
use App\Http\Controllers\UrlController;
use App\Models\User;
use Illuminate\Http\Request;
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


//when user create the new post then we are send the notification
Route::get("create_post", [NotifyUserPostController::class, 'create_post']);

//route redirect 
// http://127.0.0.1:8000/here so it redirect to the 
// http://127.0.0.1:8000/there
Route::redirect('/here', '/there');

//view route first uri,second view name, third argument is the data pass to the view
// Route::view('/welcome', 'welcome');

//pass the id from the route
// Route::get('/user/{id}', function ($id) {
//     return 'User '.$id;
// });

//optional parameter route 
// Route::get('/user/{name?}', function ($name = 'John') {
//     return $name;
// });


// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// });


// Regular Expression Constraints if the name is not alphabetic so it return the 404 error 

// Route::get('/user/{name}', function ($name) {
//     return $name;
// })->where('name', '[A-Za-z]+');

//named route 
// Route names should always be unique.
// Route::get('/user/profile', function () {
//     //
//     return "hello names route call";
// })->name('profile');
// and this route we are use the $url = route('profile'); and 
//if passing the arguments so $url = route('profile', ['id' => 1]); 


//to check the current route name 
// if ($request->route()->named('profile')) {
// here check the route name profile is match or not 
// }

// ==============
//route model binding here passing the user id and it return the user id email 
//if here the user id is not match then the return the 404 
// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// });

//in this model Soft Deleted Models are not so use after withTrashed
// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// })->withTrashed();

// and here wnat to find user using email so we want to customise it 
// Route::get('/users/{user:email}', function (User $user) {
//     return $user;
// });

// ==================

// fallback route this is always last in web.php file 
// Route::fallback(function () {
//     return "hii hardik fallback route is called ";
// });
//end of the fallback route 

// ====================
// Rate Limiting
// this is define in the RouteServiceProvider fils in app/providers configureRateLimiting  function
//rate limiting response with a 429 HTTP status code will automatically be returned by Laravel

// ==========
//Form Method Spoofing
// in this we can add manually name="_method" because the html form is not 
// support the put, patch and delete method 
// <input type="hidden" name="_method" value="PUT"> 
// also we can use the blade @method('PUT') method same as put and patch and delete

// ==============
// acess the current route 
// $route = Route::current(); 
// $name = Route::currentRouteName(); // string
// $action = Route::currentRouteAction(); 

// ==================================================url start =================

Route::get('get_url', [UrlController::class, 'get_url']);
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('about_us', [HomeController::class, 'about_us'])->name('about_us');

//this route is for the secrate route and the url there signature=string is inbulit dispaly 
//create the signed url 
Route::get('secret', function (Request $request) {
    //if the secrate message is not comes from the click url of the 
    // secreate so it will abort the 401 mesans the unauthorise page
    //it will work and also we are add this has valid signature method for the temporarysingroute
    // if (!$request->hasValidSignature()) {
    //     abort(401);
    // }

    return "This Is the Secrate Message ";
})->name('secret')->middleware("signed");
//also we are add the signed middleware and it is inbult the hasvalidsignature 
// route and if time over so return the invlid signature
