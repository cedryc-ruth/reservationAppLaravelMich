<?php

use App\Http\Controllers\ArtistController;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SaveCartController;
use App\Http\Controllers\ShowController;

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


// Show

Route::get('/', [ShowController::class,'index'])->name('show.index');
Route::get('/show/{show}', [ShowController::class,'show'])->name('show.show');
Route::get('/search', [ShowController::class,'search'])->name('show.search');
Route::get('/search-by-date',[ShowController::class,'searchByDate'])->name('show.searchbydate');
Route::get('/search-by-price',[ShowController::class,'searchByPrice'])->name('show.searchbyprice');
Route::get('/contact', [ShowController::class,'contact'])->name('show.contact');

// Export show in Excel & CSV

Route::get('/export-excel',[ShowController::class,'exportIntoExcel'])->name('show.exportExcel');
Route::get('/export-csv',[ShowController::class,'exportIntoCSV'])->name('show.exportCSV');



// Cart page

Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class,'store'])->name('cart.store');
Route::delete('/cart/{show}/destroy', [CartController::class,'destroy'])->name('cart.destroy');


// Checkout

Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout/store', [CheckoutController::class,'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class,'success'])->name('checkout.success');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// Artist

Route::get('/artist', [ArtistController::class,'index'])->name('artist.index');
Route::get('/artist/{artist}/show', [ArtistController::class,'show'])->name('artist.show');


// Authentification

Auth::routes(['verify' => true]);


// Register

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

// Route pour la vérification de l'email après enregistrement

Route::group(['middleware' => ['auth']], function () {
  
    /**
    * Email Verification Routes
    */
    Route::get('/email/verify', [VerificationController::class,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
});

//only authenticated can access this group

Route::group(['middleware' => ['auth']], function () {

    //only verified account can access with this group

    Route::group(['middleware' => ['verified']], function () {
        // Home

        Route::get('/home', [HomeController::class,'index'])->name('home.index');

        // Orders

        Route::get('/orders', [HomeController::class,'orders'])->name('home.orders');

        // Change password in home page

        Route::post('/changePassword', [HomeController::class, 'changePasswordPost'])->name('changePasswordPost');

    });
});


// Reset password if forgotten

Route::group(['middleware' => 'auth'], function () {
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});
