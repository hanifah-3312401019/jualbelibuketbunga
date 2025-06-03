@extends('layouts.penjual')

@section('title', 'Dashboard')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Box: Produk -->
    <div class="bg-purple-100 p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-1 flex items-center">
            <i class="fa-solid fa-box mr-2"></i> PRODUK
        </h3>
        <p class="text-sm text-gray-700">JUMLAH : 100</p>
    </div>

    <!-- Box: Rekap Penjualan -->
    <div class="bg-purple-100 p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-1 flex items-center">
            <i class="fa-solid fa-clipboard-list mr-2"></i> REKAPITULASI PENJUALAN
        </h3>
        <p class="text-sm text-gray-700">JUMLAH : 100</p>
    </div>
</div>
@endsection
