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
                <td class="px-4 py-2 align-top">{{ $item->user->nama ?? '-' }}</td>
                <td class="px-4 py-2 align-top">
                    @foreach ($item->detail as $d)
                        {{ $d->produk->nama ?? $d->produk }}<br>
                    @endforeach
                </td>
                <td class="px-4 py-2 align-top">
                    @foreach ($item->detail as $d)
                        {{ $d->jumlah }}<br>
                    @endforeach
                </td>
                <td class="px-4 py-2 align-top">
                    Rp{{ number_format($item->detail->sum('subtotal'), 0, ',', '.') }}
                </td>
                <td class="px-4 py-2">
                    <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-xs">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $item->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="expired" {{ $item->status == 'expired' ? 'selected' : '' }}>Expired</option>
                            <option value="failed" {{ $item->status == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </form>
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

