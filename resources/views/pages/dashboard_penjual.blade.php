@extends('layouts.penjual')

@section('title', 'Dashboard')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('success') }}
    </div>
@endif

<!-- Welcome Section -->
<div class="bg-gradient-to-r from-pink-100 to-pink-200 text-gray-800 p-6 rounded-xl shadow-lg mb-6">
    <h1 class="text-2xl font-bold mb-2">
        <i class="fa-solid fa-chart-line mr-2"></i>
        Selamat Datang di Dashboard Penjual
    </h1>
    <p class="text-gray-700">Kelola bisnis Anda dengan mudah dan pantau perkembangan penjualan</p>
</div>

<!-- Quick Actions -->
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">
        <i class="fa-solid fa-bolt mr-2 text-pink-500"></i>
        Aksi Cepat
    </h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="{{ route('produk-penjual.create') }}" class="bg-rose-400 hover:bg-rose-500 text-white p-4 rounded-lg text-center transition-all duration-300 transform hover:scale-105">
            <i class="fa-solid fa-plus text-2xl mb-2"></i>
            <p class="text-sm font-medium">Tambah Produk</p>
        </a>
        <a href="{{ route('produk-penjual.index') }}" class="bg-pink-300 hover:bg-pink-400 text-white p-4 rounded-lg text-center transition-all duration-300 transform hover:scale-105">
            <i class="fa-solid fa-list text-2xl mb-2"></i>
            <p class="text-sm font-medium">Lihat Produk</p>
        </a>
        <a href="{{ route('pesanan.index') }}" class="bg-lime-400 hover:bg-lime-500 text-white p-4 rounded-lg text-center transition-all duration-300 transform hover:scale-105">
            <i class="fa-solid fa-shopping-cart text-2xl mb-2"></i>
            <p class="text-sm font-medium">Pesanan</p>
        </a>
        <a href="{{ route('rekap.index') }}" class="bg-sky-400 hover:bg-sky-500 text-white p-4 rounded-lg text-center transition-all duration-300 transform hover:scale-105">
            <i class="fa-solid fa-chart-bar text-2xl mb-2"></i>
            <p class="text-sm font-medium">Laporan</p>
        </a>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <form method="GET" action="{{ route('pesanan.index') }}">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center">
                <i class="fa-solid fa-filter text-gray-600 mr-2"></i>
                <label for="filter" class="font-semibold text-gray-700">Filter Riwayat Pesanan:</label>
            </div>
            <select name="filter" id="filter" class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-pink-400 focus:outline-none transition-colors" onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
            </select>
        </div>
    </form>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Box: Produk -->
    <div class="bg-gradient-to-br from-rose-100 to-rose-200 text-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white bg-opacity-50 p-3 rounded-full">
                <i class="fa-solid fa-box text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-bold">{{ $jumlahProduk }}</p>
                <p class="text-gray-600 text-sm">Jumlah Produk</p>
            </div>
        </div>
        <div class="border-t border-rose-300 pt-4">
            <p class="text-sm text-gray-700">Stok Tersisa: <span class="font-semibold">{{ $jumlahStokTersisa }}</span></p>
        </div>
    </div>

    <!-- Box: Rekap Penjualan -->
    <div class="bg-gradient-to-br from-lime-100 to-lime-200 text-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white bg-opacity-50 p-3 rounded-full">
                <i class="fa-solid fa-clipboard-list text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-3xl font-bold">{{ $jumlahRekapPenjualan }}</p>
                <p class="text-lime-700 text-sm">Transaksi Sukses</p>
            </div>
        </div>
        <div class="border-t border-lime-300 pt-4">
            <p class="text-sm text-lime-800">Rekapitulasi Penjualan</p>
        </div>
    </div>

    <!-- Box: Status Toko -->
    <div class="bg-gradient-to-br from-sky-100 to-sky-200 text-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-white bg-opacity-50 p-3 rounded-full">
                <i class="fa-solid fa-store text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-2xl font-bold">AKTIF</p>
                <p class="text-sky-700 text-sm">Status Toko</p>
            </div>
        </div>
        <div class="border-t border-sky-300 pt-4">
            <p class="text-sm text-sky-700">Toko beroperasi normal</p>
        </div>
    </div>
</div>

<!-- Tips Section -->
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">
        <i class="fa-solid fa-lightbulb mr-2 text-amber-400"></i>
        Tips Hari Ini
    </h2>
    <div class="bg-orange-50 border-l-4 border-orange-300 p-4 rounded">
        <div class="flex items-start">
            <i class="fa-solid fa-info-circle text-orange-600 mt-1 mr-3"></i>
            <div>
                <p class="text-sm text-gray-700">
                    <strong>Tip:</strong> Pastikan stok produk selalu ter-update untuk menghindari kekecewaan pelanggan.
                    Produk dengan stok rendah sebaiknya segera direstok atau dihapus sementara.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">
        <i class="fa-solid fa-clock mr-2 text-pink-400"></i>
        Aktivitas Terbaru
    </h2>
    <div class="space-y-3">
        <div class="flex items-center p-3 bg-pink-50 rounded-lg">
            <div class="bg-pink-100 p-2 rounded-full mr-3">
                <i class="fa-solid fa-check text-pink-600"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-800">Dashboard berhasil dimuat</p>
                <p class="text-xs text-gray-500">{{ now()->format('d M Y, H:i') }}</p>
            </div>
        </div>

        @if($jumlahStokTersisa < 10)
        <div class="flex items-center p-3 bg-red-50 rounded-lg">
            <div class="bg-red-100 p-2 rounded-full mr-3">
                <i class="fa-solid fa-exclamation-triangle text-red-600"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-800">Peringatan: Stok produk rendah</p>
                <p class="text-xs text-gray-500">Segera restok produk Anda</p>
            </div>
        </div>
        @endif

        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
            <div class="bg-blue-100 p-2 rounded-full mr-3">
                <i class="fa-solid fa-chart-line text-blue-600"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-800">Statistik penjualan ter-update</p>
                <p class="text-xs text-gray-500">Data terbaru tersedia</p>
            </div>
        </div>
    </div>
</div>
@endsection