@extends('layouts.penjual')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="bg-gradient-to-r from-[#E8E3EF] to-[#F3F0F7] rounded-xl p-6 border border-[#D6C8E1] shadow">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-[#6B5B95]">🛍️ Daftar Pesanan</h1>
                <p class="text-[#8E7CC3]">Kelola dan pantau semua pesanan dari pembeli</p>
            </div>
            <div class="bg-[#D6C8E1] bg-opacity-60 rounded-lg p-4">
                <i class="fa-solid fa-list text-3xl text-[#6B5B95]"></i>
            </div>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @php
            $statusList = [
                ['Total', $pesanan->count(), 'from-[#F8F6FB] to-[#F0EDF6]', 'fa-shopping-cart', 'text-[#6B5B95]'],
                ['Lunas', $pesanan->where('status', 'Lunas')->count(), 'from-[#F4F8F4] to-[#EBF4EB]', 'fa-check-circle', 'text-[#4A6B4A]'],
                ['Menunggu', $pesanan->where('status', 'Menunggu Konfirmasi')->count(), 'from-[#FBF8F4] to-[#F5F0E8]', 'fa-clock', 'text-[#8A6B3A]'],
                ['Dikirim', $pesanan->where('status', 'Dikirim')->count(), 'from-[#F4F8FB] to-[#EBF2F8]', 'fa-truck', 'text-[#4A6B8A]'],
                ['Batal', $pesanan->whereIn('status', 'Kadaluarsa')->count(), 'from-[#FBF4F4] to-[#F5E8E8]', 'fa-times-circle', 'text-[#8A3A3A]'],
                ['Dikemas', $pesanan->where('status', 'Sedang Dikemas')->count(), 'from-[#FFFBEA] to-[#FFF5CC]', 'fa-box-open', 'text-[#B8860B]'],
            ];
        @endphp

        @foreach ($statusList as [$label, $count, $gradient, $icon, $textColor])
            <div class="bg-gradient-to-br {{ $gradient }} rounded-xl p-4 border shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium {{ $textColor }}">{{ $label }}</p>
                        <p class="text-2xl font-bold {{ $textColor }}">{{ $count }}</p>
                    </div>
                    <div class="rounded-full p-3 bg-white bg-opacity-50 shadow">
                        <i class="fa-solid {{ $icon }} {{ $textColor }} text-lg"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-xl shadow overflow-hidden border border-[#E8E3EF]">
        <div class="bg-gradient-to-r from-[#E8E3EF] to-[#F3F0F7] p-6">
            <h2 class="text-xl font-bold text-[#6B5B95]">📋 Detail Pesanan</h2>
            <p class="text-[#8E7CC3] text-sm">Semua pesanan yang masuk dari pembeli</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gradient-to-r from-[#F8F6FB] to-[#F0EDF6]">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Pembeli</th>
                        <th class="px-4 py-3">Produk</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Resi</th>
                        <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse ($pesanan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            {{ $item->pengguna->nama ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            @foreach ($item->detail as $d)
                                <div>{{ $d->produk->nama ?? $d->produk }}</div>
                            @endforeach
                        </td>
                        <td class="px-4 py-3">
                            @foreach ($item->detail as $d)
                                <div>{{ $d->jumlah }}</div>
                            @endforeach
                        </td>
                        <td class="px-4 py-3">
                            Rp{{ number_format($item->detail->sum('subtotal'), 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3">
                            
                        @if ($item->resi_file)
                        <a href="{{ asset($item->resi_file) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                        @else
                        <span class="text-gray-400">Belum Ada Resi</span>
                        @endif

                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-pink-300">
                                    <option value="Lunas" {{ $item->status == 'Lunas' ? 'selected' : '' }}>✅ Lunas</option>
                                    <option value="Menunggu Konfirmasi" {{ $item->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>🕓 Menunggu Konfirmasi</option>
                                    <option value="Sedang Dikemas" {{ $item->status == 'Sedang Dikemas' ? 'selected' : '' }}>📦  Sedang Dikemas</option>
                                    <option value="Dikirim" {{ $item->status == 'Dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                                    <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>✅ Selesai</option>
                                    <option value="Kadaluarsa" {{ $item->status == 'Kadaluarsa' ? 'selected' : '' }}>⏰ Kadaluarsa</option>
                                
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-12 text-gray-500">Belum Ada Pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-6">
                {{ $pesanan->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
