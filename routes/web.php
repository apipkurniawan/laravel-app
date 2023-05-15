<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DetailPesanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::resource('/user', UserController::class);

// Barang
Route::resource('/barang', BarangController::class);

// supplier
Route::resource('/supplier', SupplierController::class);

// akun
Route::resource('/akun', AkunController::class);

// setting
Route::resource('/setting', SettingController::class);

// pemesanan
Route::resource('/transaksi', PemesananController::class);

// Detail Pesan
Route::resource('/detail', DetailPesanController::class);

// pembelian
Route::resource('/pembelian', PembelianController::class);
// Route::get('/pembelian', 'PembelianController@index')->name('pembelian.transaksi');
// Route::get('/pembelian-beli/{id}', 'PembelianController@edit');
// Route::post('/pembelian/simpan', 'PembelianController@simpan');

// Cetak Invoice
// Route::resource('/cetak', PembelianController::class);
// Route::get('/laporan/faktur/{invoice}', 'PembelianController@pdf')->name('cetak.order_pdf');
