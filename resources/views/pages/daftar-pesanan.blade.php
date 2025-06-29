@extends('layouts.penjual')

@section('title', 'Daftar Pesanan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Pesanan</h1>

<div class="overflow-x-auto bg-white rounded-xl shadow p-4">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-purple-100 text-gray-700 font-semibold">
            <tr>
                <th class="px-4 py-3 text-left">No.</th>
                <th class="px-4 py-3 text-left">Nama Pembeli</th>
                <th class="px-4 py-3 text-left">Produk</th>
                <th class="px-4 py-3 text-left">Jumlah</th>
                <th class="px-4 py-3 text-left">Total Harga</th>
                <th class="px-4 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pesanan as $item)
            <tr>
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 align-top">{{ $item->user->name ?? '-' }}</td>
                <td class="px-4 py-2">
                    {{ $item->produk->nama ?? 'Produk tidak ditemukan' }}
                </td>
                <td class="px-4 py-2">{{ $item->jumlah }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td class="px-4 py-2">
                    <span class="inline-block px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center px-4 py-4 text-gray-500">Belum ada pesanan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

