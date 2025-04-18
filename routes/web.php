<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Mengimpor HomeController
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;

// Route bawaan Laravel
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [HomeController::class, 'contact']);

// Route dengan Parameter Dinamis
Route::get('/user/{id}', function ($id) {
    return 'User dengan ID ' . $id;
});

// Route Group dengan Prefix 'admin'
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });
});

// Route untuk menampilkan halaman list_barang dengan parameter dinamis
// Route::get('/listbarang/{id}/{nama}', function ($id, $nama){
//    return view('list_barang', compact('id', 'nama'));
//});

// Route menggunakan Controller (mengganti route function biasa)
Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);

Route::get('/login', [LoginController::class, 'index']);Route::get('/login', function () {
    return view('login');
});

Route::get('/DataBarang', [DataBarangController::class, 'tampilkan']);

Route::get('/directory', function () {
    return view('directory');
});

Route::get('/halaman_utama', [HalamanUtamaController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/tentang_kami', [TentangKamiController::class, 'index']);

Route::get('/detail-produk', [DetailProdukController::class, 'index']);
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);