@extends('layouts.penjual')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="space-y-6">
    <!-- Header dengan gradient -->
    <div class="bg-gradient-to-r from-[#E8E3EF] to-[#F3F0F7] rounded-xl p-6 border border-[#D6C8E1]">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2 text-[#6B5B95]">🛍️ Daftar Pesanan</h1>
                <p class="text-[#8E7CC3]">Kelola dan pantau semua pesanan dari pelanggan</p>
            </div>
            <div class="bg-[#D6C8E1] bg-opacity-60 rounded-lg p-4">
                <i class="fa-solid fa-list text-3xl text-[#6B5B95]"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gradient-to-br from-[#F8F6FB] to-[#F0EDF6] rounded-xl p-4 border border-[#E8E3EF]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#8E7CC3] text-sm font-medium">Total Pesanan</p>
                    <p class="text-2xl font-bold text-[#6B5B95]">{{ $pesanan->count() }}</p>
                </div>
                <div class="bg-[#A594C7] rounded-full p-3">
                    <i class="fa-solid fa-shopping-cart text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#F4F8F4] to-[#EBF4EB] rounded-xl p-4 border border-[#D4E4D4]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#6B8A6B] text-sm font-medium">Pesanan Lunas</p>
                    <p class="text-2xl font-bold text-[#4A6B4A]">{{ $pesanan->where('status', 'Lunas')->count() }}</p>
                </div>
                <div class="bg-[#7BA87B] rounded-full p-3">
                    <i class="fa-solid fa-check-circle text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#FBF8F4] to-[#F5F0E8] rounded-xl p-4 border border-[#E8DCC6]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#B8956B] text-sm font-medium">Pesanan Menunggu</p>
                    <p class="text-2xl font-bold text-[#8A6B3A]">{{ $pesanan->where('status', 'Menunggu Konfirmasi')->count() }}</p>
                </div>
                <div class="bg-[#D4B896] rounded-full p-3">
                    <i class="fa-solid fa-clock text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#F4F8FB] to-[#EBF2F8] rounded-xl p-4 border border-[#D4E4E8]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#6B8AB8] text-sm font-medium">Pesanan Dikirim</p>
                    <p class="text-2xl font-bold text-[#4A6B8A]">{{ $pesanan->where('status', 'Dikirim')->count() }}</p>
                </div>
                <div class="bg-[#7BA8D4] rounded-full p-3">
                    <i class="fa-solid fa-truck text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#FBF4F4] to-[#F5E8E8] rounded-xl p-4 border border-[#E8C6C6]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#B86B6B] text-sm font-medium">Pesanan Batal</p>
                    <p class="text-2xl font-bold text-[#8A3A3A]">{{ $pesanan->whereIn('status', 'Kadaluarsa')->count() }}</p>
                </div>
                <div class="bg-[#C78A8A] rounded-full p-3">
                    <i class="fa-solid fa-times-circle text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#FFFBEA] to-[#FFF5CC] rounded-xl p-4 border border-[#FFE4B5]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#DAA520] text-sm font-medium">Pesanan Dikemas</p>
                    <p class="text-2xl font-bold text-[#B8860B]">{{ $pesanan->where('status', 'Sedang Dikemas')->count() }}</p>
                </div>
                <div class="bg-[#FFD700] rounded-full p-3">
                    <i class="fa-solid fa-box-open text-white text-lg"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-[#E8FFF0] to-[#D9FBE6] rounded-xl p-4 border border-[#BCEAD5]">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#3D9970] text-sm font-medium">Pesanan Selesai</p>
                    <p class="text-2xl font-bold text-[#2E8B57]">{{ $pesanan->where('status', 'Selesai')->count() }}</p>
                </div>
                <div class="bg-[#3D9970] rounded-full p-3">
                    <i class="fa-solid fa-star text-white text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pesanan -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-[#E8E3EF]">
        <div class="bg-gradient-to-r from-[#E8E3EF] to-[#F3F0F7] p-6">
            <h2 class="text-xl font-bold text-[#6B5B95] mb-1">📋 Detail Pesanan</h2>
            <p class="text-[#8E7CC3] text-sm">Semua pesanan yang masuk dari pelanggan</p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-[#F8F6FB] to-[#F0EDF6]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-hashtag mr-2"></i>No.
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-user mr-2"></i>Nama Pembeli
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-box mr-2"></i>Produk
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-calculator mr-2"></i>Jumlah
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-money-bill mr-2"></i>Total Harga
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-[#6B5B95] uppercase tracking-wider">
                            <i class="fa-solid fa-flag mr-2"></i>Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pesanan as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="bg-[#E8E3EF] rounded-full h-8 w-8 flex items-center justify-center">
                                <span class="text-[#6B5B95] font-semibold">{{ $loop->iteration }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-r from-[#D6C8E1] to-[#C7B9D1] rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                    <i class="fa-solid fa-user text-[#6B5B95]"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $item->pengguna->nama ?? 'N/A' }}</p>
                                    <p class="text-xs text-[#8E7CC3]">Pelanggan</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @foreach ($item->detail as $d)
                                <div class="flex items-center mb-2">
                                    <div class="bg-[#F0EDF6] rounded-lg p-2 mr-2">
                                        <i class="fa-solid fa-seedling text-[#8E7CC3]"></i>
                                    </div>
                                    <span class="font-medium text-gray-700">{{ $d->produk->nama ?? $d->produk }}</span>
                                </div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @foreach ($item->detail as $d)
                                <div class="flex items-center mb-2">
                                    <div class="bg-[#EBF4EB] rounded-full px-3 py-1 border border-[#D4E4D4]">
                                        <span class="text-[#4A6B4A] font-semibold">{{ $d->jumlah }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="bg-gradient-to-r from-[#FBF8F4] to-[#F5F0E8] rounded-lg p-3 border border-[#E8DCC6]">
                                <p class="font-bold text-[#8A6B3A]">Rp{{ number_format($item->detail->sum('subtotal'), 0, ',', '.') }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()" class="
                                    border-2 rounded-lg px-3 py-2 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#A594C7] transition-all duration-200
                                    {{ $item->status == 'pending' ? 'bg-[#FBF8F4] border-[#E8DCC6] text-[#8A6B3A]' : '' }}
                                    {{ $item->status == 'paid' ? 'bg-[#F4F8F4] border-[#D4E4D4] text-[#4A6B4A]' : '' }}
                                    {{ $item->status == 'dikirim' ? 'bg-[#F4F8FB] border-[#D4E4E8] text-[#4A6B8A]' : '' }}
                                    {{ $item->status == 'expired' ? 'bg-[#FBF4F4] border-[#E8C6C6] text-[#8A3A3A]' : '' }}
                                    {{ $item->status == 'failed' ? 'bg-[#FBF4F4] border-[#E8C6C6] text-[#8A3A3A]' : '' }}
                                ">
                                    <option value="Lunas" {{ $item->status == 'Lunas' ? 'selected' : '' }}>✅ Lunas</option>
                                    <option value="Menunggu Konfirmasi" {{ $item->status == 'Menunggu Konfirmasi' ? 'selected' : '' }}>🕓 Menunggu Konfirmasi</option>
                                    <option value="Sedang Dikemas" {{ $item->status == 'Sedang Dikemas' ? 'selected' : '' }}>📦 Sedang Dikemas</option>
                                    <option value="Dikirim" {{ $item->status == 'Dikirim' ? 'selected' : '' }}>🚚 Dikirim</option>
                                    <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>✅ Selesai</option>
                                    <option value="Kadaluarsa" {{ $item->status == 'Kadaluarsa' ? 'selected' : '' }}>⏰ Kadaluarsa</option>

                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="bg-gray-100 rounded-full p-6 mb-4">
                                    <i class="fa-solid fa-inbox text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum Ada Pesanan</h3>
                                <p class="text-gray-500">Pesanan dari pelanggan akan muncul di sini</p>
                            </div>
                        </td>
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

<style>
    /* Animasi hover untuk tabel */
    tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    /* Smooth transition untuk select */
    select {
        transition: all 0.3s ease;
    }
    
    select:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection