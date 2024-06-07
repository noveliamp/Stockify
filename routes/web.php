<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ObatTidakLayakController;

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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('/edit-kategori', function () {
        return view('kategoris.updated');
    });

    Route::resource('/obat', ObatController::class);

    // kategori
    Route::resource('kategoris', KategoriController::class);

    Route::resource('obattidaklayak', ObatTidakLayakController::class);

    Route::resource('/dashboard', DashboardController::class);

    Route::resource('barang-keluar', BarangKeluarController::class);

    Route::post('/dashboard/clear-notifications', [DashboardController::class, 'clearNotifications'])->name('dashboard.clear-notifications');
});
