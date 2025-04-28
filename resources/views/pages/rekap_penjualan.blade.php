@extends('layouts.penjual')

@section('title', 'Rekapitulasi Penjualan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold flex items-center gap-2">
        📋 REKAP PENJUALAN
    </h1>
</div>

<div class="overflow-x-auto mt-6">
    <table class="w-full border text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-2">No.</th>
                <th class="border px-2 py-2">Tanggal</th>
                <th class="border px-2 py-2">Nama Produk</th>
                <th class="border px-2 py-2">Harga Produk</th>
                <th class="border px-2 py-2">Jumlah Produk</th>
                <th class="border px-2 py-2">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekapPenjualan as $index => $rekap)
            <tr>
                <td class="border px-2 py-2">{{ $index + 1 }}</td>
                <td class="border px-2 py-2">{{ \Carbon\Carbon::parse($rekap->tanggal)->format('d M Y') }}</td>
                <td class="border px-2 py-2">{{ $rekap->nama_produk }}</td>
                <td class="border px-2 py-2">Rp {{ number_format($rekap->harga_produk, 0, ',', '.') }}</td>
                <td class="border px-2 py-2">{{ $rekap->jumlah_produk }}</td>
                <td class="border px-2 py-2">Rp {{ number_format($rekap->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
