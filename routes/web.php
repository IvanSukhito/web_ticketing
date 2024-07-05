<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AcaraUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorDashboardController;
use App\Http\Controllers\VendorClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Sebelum login

Route::get('/', [HomeController::class, 'index']);

Route::get('/details/{slug}', [AcaraUserController::class, 'index'])->name('detail');
Route::get('/search', [HomeController::class, 'search'])->name('frontend.search');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('front.category');
// Route::get('/checkout/event/{slug}', [AcaraUserController::class, 'checkout'])->name('checkout');
// Route::post('/checkout/pay', [AcaraUserController::class, 'checkoutPay'])->name('checkout-pay');


Auth::routes();

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    //route admin
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/acara', AcaraController::class)->names('admin.acara');

    //ROUTE KE TIKET DARI ACARA ID
    Route::resource('/acara.tickets', TicketController::class)->names('admin.acara.tickets');

    Route::resource('kategori', CategoryController::class)->names('admin.kategori');

    //banner
    Route::resource('/banner', BannerController::class)->names('admin.banners');
    //vendor
    Route::resource('/vendor-client', VendorClientController::class)->names('admin.vendor-client');
    Route::get('/banner/{id}/update-priority',  [App\Http\Controllers\BannerController::class, 'updatePriority'])->name('admin.banners.updatePriority');
    //Route::resourse('/vendor', VendorController::class)->names('admin.vendor');
});

Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    //route user

    Route::get('/checkout/event/{slug}', [AcaraUserController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/pay', [AcaraUserController::class, 'checkoutPay'])->name('checkout-pay');


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::prefix('vendor')->middleware(['auth', 'auth.vendor'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\VendorDashboardController::class, 'index'])->name('vendor.dashboards');
    Route::resource('/acara', VendorController::class)->names('vendor.acara');
    Route::resource('/acara.tickets', TicketController::class)->names('vendor.acara.tickets');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('vendor.transactions');
    //Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'CallBackGoogle'])->name('google-auth.callback');
Route::get('logout', function () {
    Auth::logout();
});
