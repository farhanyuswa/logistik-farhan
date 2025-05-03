<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\StokController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Redirect root to daftar stok
Route::get('/', function () {
    return redirect()->route('stok-barang');
});

// CRUD Barang Masuk
Route::resource('barang-masuk', BarangMasukController::class)->except(['show']);
//   • GET    /barang-masuk ..............→ index (barang-masuk.index)
//   • GET    /barang-masuk/create ......→ create (barang-masuk.create)
//   • POST   /barang-masuk .............→ store (barang-masuk.store)
//   • GET    /barang-masuk/{id}/edit ...→ edit (barang-masuk.edit)
//   • PUT    /barang-masuk/{id} ........→ update (barang-masuk.update)
//   • DELETE /barang-masuk/{id} ........→ destroy (barang-masuk.destroy)

// CRUD Barang Keluar
Route::resource('barang-keluar', BarangKeluarController::class)->except(['show']);
//   • GET    /barang-keluar ............→ index (barang-keluar.index)
//   • GET    /barang-keluar/create .....→ create (barang-keluar.create)
//   • POST   /barang-keluar ...........→ store (barang-keluar.store)
//   • GET    /barang-keluar/{id}/edit ..→ edit (barang-keluar.edit)
//   • PUT    /barang-keluar/{id} .......→ update (barang-keluar.update)
//   • DELETE /barang-keluar/{id} .......→ destroy (barang-keluar.destroy)

// Daftar Stok Barang
Route::get('stok-barang', [StokController::class, 'index'])
     ->name('stok-barang');
//   • GET    /stok-barang → index (stok-barang)
