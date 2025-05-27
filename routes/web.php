<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdukPenjualController;
use App\Http\Controllers\RekapPenjualanController;
use App\Http\Controllers\DashboardPenjualController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProfilPenjualController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\LoginPenjualController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup', [SignupController::class, 'showSignup']);
Route::post('/signup', [SignupController::class, 'register']);



Route::get('/DataBarang', [DataBarangController::class, 'tampilkan']);

Route::get('/directory', function () {
    return view('directory');
});

Route::get('/halaman_utama', [HalamanUtamaController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/tentang_kami', [TentangKamiController::class, 'index']);

Route::get('/detail-produk', [DetailProdukController::class, 'index'])->name('pages.detail-produk');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('pages.keranjang');
Route::post('/keranjang', [KeranjangController::class, 'store'])->name('pages.keranjang.store');
Route::get('/checkout', [CheckoutController::class, 'checkout']);


Route::get('/listproduct', [ProductController::class, 'show']);

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/rekap-penjualan', [RekapPenjualanController::class, 'index'])->name('rekap.index');
Route::get('/dashboard-penjual', [DashboardPenjualController::class, 'index'])->name('dashboard.penjual');


Route::get('/editprofil', [UserProfileController::class, 'edit']);

Route::get('/kategori_produk', [KategoriProdukController::class, 'index'])->name('kategori.index');
Route::get('/kategori_produk/create', [KategoriProdukController::class, 'create'])->name('kategori.create');
Route::post('/kategori_produk', [KategoriProdukController::class, 'store'])->name('kategori.store');
Route::get('/kategori_produk/{id}/edit', [KategoriProdukController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori_produk/{id}', [KategoriProdukController::class, 'update'])->name('kategori.update');
Route::delete('/kategori_produk/{id}', [KategoriProdukController::class, 'destroy'])->name('kategori.destroy');


Route::delete('/produk-penjual/{id}', [ProdukPenjualController::class, 'destroy'])->name('produk.destroy');
Route::get('/profil-penjual', [ProfilPenjualController::class, 'edit'])->name('profil.penjual');
Route::get('/login-penjual', [LoginPenjualController::class, 'showLoginForm'])->name('login.penjual');
Route::get('/produk-penjual/create', [ProdukPenjualController::class, 'create'])->name('produk-penjual.create');

Route::get('/hubungi_kami', function () {
    return view('pages.hubungi_kami');
});

Route::get('/resi', [ResiController::class, 'index'])->name('resi');

Route::get('/produk-penjual', [ProdukPenjualController::class, 'index'])->name('produk-penjual.index');
Route::get('/produk-penjual/create', [ProdukPenjualController::class, 'create'])->name('produk-penjual.create');
Route::post('/produk-penjual', [ProdukPenjualController::class, 'store'])->name('produk-penjual.store');
Route::get('/produk-penjual/{id}/edit', [ProdukPenjualController::class, 'edit'])->name('produk-penjual.edit');
Route::put('/produk-penjual/{id}', [ProdukPenjualController::class, 'update'])->name('produk-penjual.update');
Route::delete('/produk-penjual/{id}', [ProdukPenjualController::class, 'destroy'])->name('produk-penjual.destroy');
