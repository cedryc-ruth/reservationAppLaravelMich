<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Spatie\Feed\Http\FeedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtistViaApiController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RepresentationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Models\Representation;

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


// Show routes

Route::get('/', [ShowController::class,'index'])->name('show.index');
Route::get('/show/{show}', [ShowController::class,'show'])->name('show.show');
Route::get('/search', [ShowController::class,'search'])->name('show.search');
Route::get('/search-by-date', [ShowController::class,'searchByDate'])->name('show.searchbydate');
Route::get('/search-by-price', [ShowController::class,'searchByPrice'])->name('show.searchbyprice');



Route::group(['prefix'=>'admin','middleware' =>['isAdmin','auth']], function () {
    // Export shows in Excel or CSV

    Route::get('/export-excel', [ShowController::class,'exportIntoExcel'])->name('exportExcel');
    Route::get('/export-csv', [ShowController::class,'exportIntoCSV'])->name('exportCSV');

    // Export shows in PDF

    // Route::get('/all-view',[ShowController::class,'getAllshow'])->name('allView');
    Route::get('/export-pdf', [ShowController::class,'downloadPDF'])->name('downloadPDF');

    // Import shows in Excel or CSV

    Route::get('/import-form', [ShowController::class,'importForm'])->name('importForm');
    Route::post('/import', [ShowController::class,'import'])->name('import');

     // Representations route

     Route::resource('representation', RepresentationController::class);

  

});




// Flux RSS route

// Route::feeds();
Route::get('feed', FeedController::class)->name("feeds.main");


// Route de la page qui explique l'utilisation de notre api


Route::get('api', [ShowController::class,'getApi'])->name("show.api");


// Cart page routes

Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class,'store'])->name('cart.store');
Route::delete('/cart/{show}/destroy', [CartController::class,'destroy'])->name('cart.destroy');


// Checkout routes  (Le middleware "auth" appliqué dans le constructeur du contrôleur)

Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout/store', [CheckoutController::class,'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class,'success'])->name('checkout.success');


// Voyager TCG routes

Route::group(['prefix' => 'admin','middleware' =>['auth']], function () {
    Voyager::routes();
});


// Artist routes

Route::resource('artist', ArtistController::class);

// Artistes externes route  via l'api  du théâtre de la ville de Paris.

Route::get('artist-api', [ArtistViaApiController::class,'index'])->name('artist_api.index');


// Type routes

Route::resource('type', TypeController::class);

// Location routes

Route::resource('location', LocationController::class);


// Locality routes


Route::resource('locality', LocalityController::class);


// Room routes


Route::resource('room', RoomController::class);




// Authentification routes


Auth::routes(['verify' => true]);



// Register routes

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

// Routes pour la vérification de l'email après enregistrement

Route::group(['middleware' => ['auth']], function () {
  
    /**
    * Email Verification Routes
    */
    Route::get('/email/verify', [VerificationController::class,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class,'resend'])->name('verification.resend');
});


// Only authenticated person can access this group

Route::group(['middleware' => 'auth'], function () {

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


// Reset password if forgotten routes

Route::group(['middleware' => 'auth'], function () {
    Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
});



// Mail & Contact routes

Route::get('/contact',[ShowController::class,'contact'])->name('show.contact');
Route::post('/send-email',[MailController::class,'sendMail'])->name('show.mailing');