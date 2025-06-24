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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PesananController;


// Route dasar Laravel
// <--- Route default & halaman umum --->
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/directory', function () {
    return view('directory');
});
Route::get('/home', function () {
    return view('pages.home');
});
Route::get('/hubungi_kami', function () {
    return view('pages.hubungi_kami');
});

// <--- Route dinamis sederhana --->
Route::get('/user/{id}', function ($id) {
    return 'User dengan ID ' . $id;
});

// <--- Route grup untuk admin --->
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });
});

// <--- Autentikasi pengguna --->
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [SignupController::class, 'showSignup']);
Route::post('/signup', [SignupController::class, 'register']);

// <--- Login khusus penjual --->
Route::get('/login-penjual', [LoginPenjualController::class, 'showLoginForm'])->name('login.penjual');

// <--- Halaman utama & informasi --->
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/halaman_utama', [HalamanUtamaController::class, 'index']);

Route::get('/tentang_kami', [TentangKamiController::class, 'index']);

// <--- Produk Umum --->
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/detail-produk', [DetailProdukController::class, 'index'])->name('pages.detail-produk');

// <--- Produk Penjual --->
Route::get('/produk-penjual', [ProdukPenjualController::class, 'index'])->name('produk-penjual.index');
Route::get('/produk-penjual/create', [ProdukPenjualController::class, 'create'])->name('produk-penjual.create');
Route::post('/produk-penjual', [ProdukPenjualController::class, 'store'])->name('produk-penjual.store');
Route::get('/produk-penjual/{id}/edit', [ProdukPenjualController::class, 'edit'])->name('produk-penjual.edit');
Route::put('/produk-penjual/{id}', [ProdukPenjualController::class, 'update'])->name('produk-penjual.update');
Route::delete('/produk-penjual/{id}', [ProdukPenjualController::class, 'destroy'])->name('produk-penjual.destroy');

// <--- Kategori Produk --->
Route::get('/kategori_produk', [KategoriProdukController::class, 'index'])->name('kategori.index');
Route::get('/kategori_produk/create', [KategoriProdukController::class, 'create'])->name('kategori.create');
Route::post('/kategori_produk', [KategoriProdukController::class, 'store'])->name('kategori.store');
Route::get('/kategori_produk/{id}/edit', [KategoriProdukController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori_produk/{id}', [KategoriProdukController::class, 'update'])->name('kategori.update');
Route::delete('/kategori_produk/{id}', [KategoriProdukController::class, 'destroy'])->name('kategori.destroy');

// <--- Keranjang --->
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('pages.keranjang.index');
Route::post('/keranjang', [KeranjangController::class, 'store'])->name('pages.keranjang.store');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('pages.keranjang.destroy');
Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::post('/keranjang/clear', [KeranjangController::class, 'clear'])->name('keranjang.clear');

// <--- Checkout --->
Route::get('/checkout', [CheckoutController::class, 'checkout']);

// <--- Rekap dan dashboard --->
Route::get('/rekap-penjualan', [RekapPenjualanController::class, 'index'])->name('rekap.index');
Route::get('/dashboard-penjual', [DashboardPenjualController::class, 'index'])->name('dashboard.penjual');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/dashboard-penjual/pesanan', [PesananController::class, 'index'])->name('pesanan.index');

// <--- Edit Profil Pengguna --->
Route::get('/editprofil', [UserProfileController::class, 'edit']);
Route::post('/editprofil', [UserProfileController::class, 'update']);

// <--- Profil Penjual --->
Route::get('/profil-penjual', [ProfilPenjualController::class, 'edit'])->name('profil.penjual');
Route::put('/profil-penjual', [ProfilPenjualController::class, 'update'])->name('penjual.updateProfil');
Route::post('/profil-penjual', [ProfilPenjualController::class, 'update'])->name('penjual.updateProfil');

// <--- Profil Penjual dengan Middleware --->
Route::middleware(['auth:penjual'])->group(function () {
    Route::get('/profil-penjual/edit', [ProfilPenjualController::class, 'edit'])->name('profil.penjual');
    Route::put('/profil-penjual/update', [ProfilPenjualController::class, 'update'])->name('penjual.updateProfil');
});

// <--- List Barang (dengan parameter) --->
Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);

// <--- Data Barang --->
Route::get('/DataBarang', [DataBarangController::class, 'tampilkan']);

// <--- Produk Publik (list, search, dsb) --->
Route::get('/listproduct', [ProductController::class, 'show']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/autocomplete', [SearchController::class, 'autocomplete'])->name('search.autocomplete');

// <--- Resi / Tracking --->
Route::get('/resi', [ResiController::class, 'index'])->name('resi');
Route::get('/produk-penjual', [ProdukPenjualController::class, 'index'])->name('produk-penjual.index');

