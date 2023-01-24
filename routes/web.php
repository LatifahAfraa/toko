<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjualanController;

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


Auth::routes();



Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::resource('user', UserController::class);

    Route::resource('barang', BarangController::class);

    Route::resource('penjualan', PenjualanController::class);

    Route::get('laporan',[LaporanController::class, 'index'])->name('laporan');
    Route::get('cetak-laporan',[LaporanController::class, 'cetak'])->name('cetak');



});



