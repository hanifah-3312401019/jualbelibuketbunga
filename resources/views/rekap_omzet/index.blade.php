@extends('layouts.penjual')

@section('title', 'Rekapitulasi Penjualan')

@section('content')
<h1 class="text-2xl font-bold mb-4">📋 REKAP TOTAL OMZET PENJUALAN</h1>

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
@endsection
