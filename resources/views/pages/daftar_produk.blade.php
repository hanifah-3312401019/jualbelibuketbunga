@extends('layouts.penjual')

@section('title', 'Daftar Produk')

@section('content')

<div class="flex flex-col gap-6">

    {{-- Tombol Tambah Produk --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold">Daftar Produk</h1>
        <a href="{{ route('produk-penjual.create') }}">
            <button class="bg-pink-500 text-white px-4 py-2 rounded-xl shadow hover:bg-pink-600 flex items-center gap-2 transition">
                <span class="text-xl font-bold">＋</span> Tambah Produk
            </button>
        </a>
    </div>

    {{-- Kolom Pencarian --}}
    <form method="GET" action="{{ route('produk-penjual.index') }}" class="flex items-center gap-3 max-w-md">
        <input 
            type="text" 
            name="cari" 
            value="{{ request('cari') }}" 
            placeholder="Cari produk..." 
            class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
        >
        <button type="submit" class="bg-pink-400 text-white px-4 py-2 rounded-xl hover:bg-pink-800 transition">Cari</button>
    </form>

    
    
    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-xl shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Produk --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden text-sm">
            <thead class="bg-gray-100 text-gray-700 text-left">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Produk</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($produks as $index => $produk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 flex items-center gap-3">
                            @if ($produk->gambar)
                                <img src="{{ asset($produk->gambar) }}" class="w-12 h-12 object-cover rounded-lg border" alt="Produk">
                            @endif
                            <span class="font-medium">{{ $produk->nama }}</span>
                        </td>
                        <td class="px-4 py-3">{{ $produk->kategori }}</td>
                        <td class="px-4 py-3">{{ Str::limit($produk->deskripsi, 50) }}</td>
                        <td class="px-4 py-3 text-pink-600 font-semibold">Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $produk->stok }}</td>
                        <td class="px-4 py-3 flex items-center gap-2">
                            <a href="{{ route('produk-penjual.edit', $produk->id_produk) }}"
                               class="bg-green-500 text-white px-3 py-1 rounded-md text-xs hover:bg-green-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('produk-penjual.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded-md text-xs hover:bg-red-600 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
