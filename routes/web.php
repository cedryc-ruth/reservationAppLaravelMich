<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SaveCartController;

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

//Home



// Main page

Route::get('/home',[HomeController::class,'index'])->name('home');

//Shop

Route::get('/', [ShopController::class,'index'])->name('spectacles');
Route::get('/shop/{show}', [ShopController::class,'show'])->name('shop.show');
Route::get('/shop/{show}/byId', [ShopController::class,'showById'])->name('shop.showById');
Route::get('/contact', [ShopController::class,'contact'])->name('contact');


// Cart page

Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
Route::get('/reset', [CartController::class,'reset'])->name('cart.reset');
Route::delete('/cart/{show}/destroy',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('/cart/{show}/save',[CartController::class,'save'])->name('cart.save');

// Save Cart


Route::delete('/save/{show}/destroy',[SaveCartController::class,'destroy'])->name('save.destroy');
Route::post('/save/{show}/store',[SaveCartController::class,'store'])->name('save.store');


// Checkout

Route::get('/checkout', [MainController::class,'checkout'])->name('checkout.index');
Route::get('/checkout/success', [MainController::class,'success'])->name('checkout.success');

// Orders

Route::get('/orders', [MainController::class,'orders'])->name('orders');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// Authentification

Auth::routes(['verify' => true]);

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);

// Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/changePassword', [HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});







