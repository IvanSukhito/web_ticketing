<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AcaraUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
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

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/details/{slug}', [AcaraUserController::class, 'index'])->name('detail');



Auth::routes();

// //ROUTE ACARA 
// Route::get('/admin/acara', [AcaraController::class, 'index'])->name('acara');
// //ROUTE KE FORM ACARA CREATE
// Route::get('/admin/acara/create', [AcaraController::class, 'create'])->name('create');
// //STORE DATA
// Route::post('/admin/acara', [AcaraController::class, 'store'])->name('admin.acara.create');

//ROUTE RESOURCE ACARA

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    //route admin
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/acara', AcaraController::class);

    //ROUTE KE TIKET DARI ACARA ID
    Route::resource('admin/acara.tickets', TicketController::class)->names('admin.acara.tickets');

    Route::resource('admin/kategori', CategoryController::class);
});
Route::prefix('user')->middleware(['auth', 'auth.user'])->group(function () {
    //route user

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('logout', function () {
    Auth::logout();
});
