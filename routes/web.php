<?php

use App\Models\Product;
use App\Http\Controllers\{HomeController};
use Illuminate\Support\Facades\{Route,Auth};
use App\Http\Controllers\User\{UserController};
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Company\{ProductController};
use App\Http\Controllers\Payment\{PaypallController}; 
use App\Http\Controllers\Admin\{AdminController,CompanyController};

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
    Route::get('myorders/status', [OrderController::class, 'order_status'])->name('myorder.status');

    });
    // Company
Route::group(['middleware' => ['auth', 'CheckRole:3'], 'prefix' => 'company', 'as' => 'company.'], function () {
    // impement code by viewcomposer
    Route::view('/dashboard','company.dashboard')->name('dashboard');
    Route::resource('/product', ProductController::class);
    });

Route::post('/product/checkout/{id}', [PaypallController::class, 'checkout'])->name('checkout.product')->middleware(['auth', 'CheckRole:2']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/buy', function(){  
    return view('product.buy',['products'=> Product::get()]);})->name('product.buy')->middleware(['auth', 'CheckRole:2']);
    

Route::get('/logout', function(){
    Auth::logout();

    return redirect('/login');
});


Route::get('payment/success', [PaypallController::class, 'success'])->name('payment.success');
Route::get('payment/cancel', [PaypallController::class, 'cancel'])->name('payment.cancel');



Route::post('/product/checkout/{id}', [PaypallController::class, 'checkout'])->name('checkout.product')->middleware(['auth', 'CheckRole:2']);
