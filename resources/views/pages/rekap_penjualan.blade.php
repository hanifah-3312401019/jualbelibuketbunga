@extends('layouts.penjual')

@section('title', 'Rekapitulasi Penjualan')

@section('content')

<!-- Filter Form -->
<div class="bg-white p-4 rounded-lg shadow mb-6">
    <form method="GET" action="{{ route('rekap.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Filter Periode</label>
            <select name="filter" class="w-full border rounded px-3 py-2" onchange="toggleCustomDate(this.value)">
                <option value="mingguan" {{ $filter == 'mingguan' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="bulanan" {{ $filter == 'bulanan' ? 'selected' : '' }}>Bulan Ini</option>
                <option value="custom" {{ $filter == 'custom' ? 'selected' : '' }}>Pilih Tanggal</option>
            </select>
        </div>
        
        <div id="dateFrom" class="{{$filter != 'custom' ? 'hidden' : ''}}">
            <label class="block text-sm font-medium mb-1">Dari Tanggal</label>
            <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full border rounded px-3 py-2">
        </div>
        
        <div id="dateTo" class="{{$filter != 'custom' ? 'hidden' : ''}}">
            <label class="block text-sm font-medium mb-1">Sampai Tanggal</label>
            <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full border rounded px-3 py-2">
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors">
                📊 Filter Data
            </button>
        </div>
    </form>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-4 rounded-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm opacity-90">Total Pendapatan</p>
                <p class="text-2xl font-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            </div>
            <div class="text-3xl opacity-75">💰</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-4 rounded-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm opacity-90">Total Transaksi</p>
                <p class="text-2xl font-bold">{{ $rekapPenjualan->count() }}</p>
            </div>
            <div class="text-3xl opacity-75">🛒</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm opacity-90">Rata-rata per Transaksi</p>
                <p class="text-2xl font-bold">
                    Rp {{ $rekapPenjualan->count() > 0 ? number_format($totalPendapatan / $rekapPenjualan->count(), 0, ',', '.') : '0' }}
                </p>
            </div>
            <div class="text-3xl opacity-75">📈</div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-4 rounded-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm opacity-90">Periode</p>
                <p class="text-lg font-bold">{{ ucfirst($filter == 'custom' ? 'Custom' : $filter) }}</p>
                @if($filter == 'custom' && request('date_from') && request('date_to'))
                    <p class="text-xs opacity-75">{{ \Carbon\Carbon::parse(request('date_from'))->format('d M') }} - {{ \Carbon\Carbon::parse(request('date_to'))->format('d M Y') }}</p>
                @endif
            </div>
            <div class="text-3xl opacity-75">📅</div>
        </div>
    </div>
</div>

<!-- Export Buttons -->
<div class="mb-4">
    <a href="{{ route('rekap.exportPdf', array_merge(['filter' => $filter], request()->only(['date_from', 'date_to']))) }}" 
       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors">
        📄 Export PDF
    </a>
    
</div>

<!-- Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 font-medium text-gray-700">No.</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Tanggal</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Nama Produk</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Harga Produk</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Jumlah Produk</th>
                    <th class="px-4 py-3 font-medium text-gray-700">Total Harga</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($rekapPenjualan as $index => $rekap)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($rekap->created_at)->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        @foreach ($rekap->detail as $d)
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mb-1">
                                {{ $d->produk->nama ?? $d->produk }}
                            </span><br>
                        @endforeach
                    </td>
                    <td class="px-4 py-3">
                        @foreach ($rekap->detail as $d)
                            <span class="text-gray-700">Rp {{ number_format($d->harga, 0, ',', '.') }}</span><br>
                        @endforeach
                    </td>
                    <td class="px-4 py-3">
                        @foreach ($rekap->detail as $d)
                            <span class="font-medium">{{ $d->jumlah }}</span><br>
                        @endforeach
                    </td>
                    <td class="px-4 py-3">
                        <span class="font-bold text-green-600">
                            Rp {{ number_format($rekap->detail->sum('subtotal'), 0, ',', '.') }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                        <div class="text-6xl mb-2">📭</div>
                        <p class="text-lg">Tidak ada data penjualan untuk periode ini</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
// Toggle custom date inputs
function toggleCustomDate(value) {
    const dateFrom = document.getElementById('dateFrom');
    const dateTo = document.getElementById('dateTo');
    
    if (value === 'custom') {
        dateFrom.classList.remove('hidden');
        dateTo.classList.remove('hidden');
    } else {
        dateFrom.classList.add('hidden');
        dateTo.classList.add('hidden');
    }
}
</script>

@endsection