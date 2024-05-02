<?php

use App\Http\Controllers\AcaraController;
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
    return view('welcome');
});



Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //ROUTE ACARA 
// Route::get('/admin/acara', [AcaraController::class, 'index'])->name('acara');
// //ROUTE KE FORM ACARA CREATE
// Route::get('/admin/acara/create', [AcaraController::class, 'create'])->name('create');
// //STORE DATA
// Route::post('/admin/acara', [AcaraController::class, 'store'])->name('admin.acara.create');

//ROUTE RESOURCE ACARA
Route::resource('admin/acara', AcaraController::class);
//EDIT DATA
