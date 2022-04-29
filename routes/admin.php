<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\CmsPagesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ErrorController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['revalidate']], function () {
	Route::get('/home', function () {
		return redirect(route('admin.dashboard.index'));
	})->name('home');

	// Profile
	Route::get('profile/', [PagesController::class, 'profile'])->name('profile-view');
	Route::post('profile/update', [PagesController::class, 'updateProfile'])->name('profile.update');
	Route::put('change/password', [PagesController::class, 'updatePassword'])->name('update-password');

	// Quick Link
	Route::get('quickLink', [PagesController::class, 'quickLink'])->name('quickLink');
	Route::post('link/update', [PagesController::class, 'updateQuickLink'])->name('update-quickLink');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['check_permit', 'revalidate']], function () {

	/* Dashboard */
	Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard.index');
	Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard.index');

	/* category */
	Route::get('category/listing', [CategoryController::class, 'listing'])->name('category.listing');
	Route::resource('category', CategoryController::class);

	// news details
	Route::get('news/listing', [NewsController::class, 'listing'])->name('news.listing');
	Route::resource('news', NewsController::class);

	/* User */
	Route::get('users/listing', [UsersController::class, 'listing'])->name('users.listing');
	Route::resource('users', UsersController::class);


	/* Role Management */
	Route::get('roles/listing', [AdminController::class, 'listing'])->name('roles.listing');
	Route::resource('roles', AdminController::class);

	/* CMS Management*/
	Route::get('pages/listing', [CmsPagesController::class, 'listing'])->name('pages.listing');
	Route::resource('pages', CmsPagesController::class);

	/* Site Configuration */
	Route::get('settings', [PagesController::class, 'showSetting'])->name('settings.index');
	Route::post('change-setting', [PagesController::class, 'changeSetting'])->name('settings.change-setting');
});

//User Exception
Route::get('users-error-listing', [ErrorController::class, 'listing'])->name('error.listing');
//Chart routes
Route::get('register-users-chart', [ChartController::class, 'getRegisterUser'])->name('users.registerchart');
Route::get('active-deactive-users-chart', [Admin\ChartController::class, 'getActiveDeactiveUser'])->name('users.activeDeactiveChart');

Route::post('check-email', [UtilityController::class, 'checkEmail'])->name('check.email');
Route::post('check-contact', [UtilityController::class, 'checkContact'])->name('check.contact');

Route::post('summernote-image-upload', [SummernoteController::class, 'imageUpload'])->name('summernote.imageUpload');
Route::post('summernote-media-image', [SummernoteController::class, 'mediaDelete'])->name('summernote.mediaDelete');

Route::post('check-title', [UtilityController::class, 'checkTitle'])->name('check.title');
Route::post('profile/check-password', [UtilityController::class, 'profilecheckpassword'])->name('profile.check-password');
