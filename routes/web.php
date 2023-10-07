<?php

use Illuminate\Support\Facades\{Route,Auth};
use App\Http\Controllers\{HomeController};
use App\Http\Controllers\User\{UserController};
use App\Http\Controllers\Admin\{AdminController,CompanyController};
use App\Http\Controllers\Company\{ProductController};
// use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Payment\{PaypallController};
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::fallback(function () {
    return view('errors.PageNotFound');
});
// Route::view('/unauthorized','errors.unauthorized')->name('unauthorized');

//  Admin
Route::group(['middleware' => ['auth', 'CheckRole:1'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/company', CompanyController::class);

    });
Route::group(['middleware' => ['auth', 'CheckRole:2'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    });
    // Company
Route::group(['middleware' => ['auth', 'CheckRole:3'], 'prefix' => 'company', 'as' => 'company.'], function () {
    // impement code by viewcomposer
    Route::view('/dashboard','company.dashboard');
    Route::resource('/product', ProductController::class);
    });

Route::post('/product/checkout/{id}', [PaypallController::class, 'checkout'])->name('checkout.product')->middleware(['auth', 'CheckRole:2']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/logout', function(){
    Auth::logout();

    return redirect('/login');
});