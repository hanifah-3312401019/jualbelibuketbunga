@extends('layouts.penjual')

@section('title', 'Rekapitulasi Penjualan')

@section('content')
<h1 class="text-2xl font-bold mb-4">📋 REKAP PENJUALAN & TOTAL OMZET</h1>

<form method="GET" action="{{ route('rekap.index') }}" class="mb-4">
    <select name="filter" class="border px-2 py-1">
        <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
        <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
    </select>
    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Filter</button>
</form>

<div class="mb-4">
    <p class="text-lg">Periode: <strong>{{ ucfirst($filter) }}</strong></p>
    <p class="text-lg">Total Pendapatan: <strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></p>
</div>

<a href="{{ route('rekap.exportPdf', ['filter' => $filter]) }}" class="bg-red-500 text-white px-3 py-1 rounded">Export PDF</a>
<a href="{{ route('rekap.exportExcel', ['filter' => $filter]) }}" class="bg-green-500 text-white px-3 py-1 rounded ml-2">Export Excel</a>

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
                <td class="border px-2 py-2">{{ \Carbon\Carbon::parse($rekap->created_at)->format('d M Y') }}</td>
                <td class="border px-2 py-2">-</td> {{-- Kalau mau ada nama produk, nanti tinggal diisi sesuai relasi produk --}}
                <td class="border px-2 py-2">Rp {{ number_format($rekap->total, 0, ',', '.') }}</td>
                <td class="border px-2 py-2">-</td>
                <td class="border px-2 py-2">Rp {{ number_format($rekap->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
