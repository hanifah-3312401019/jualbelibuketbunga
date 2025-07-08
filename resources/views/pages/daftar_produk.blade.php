@extends('layouts.penjual')

@section('title', 'Daftar Produk')

@section('content')

    {{-- Tombol Tambah Produk di atas kolom cari --}}
    <div class="mb-2">
        <a href="{{ route('produk-penjual.create') }}">
            <button class="bg-pink-200 text-black py-2 px-4 rounded hover:bg-pink-300 flex items-center gap-2">
                <span class="text-xl">＋</span> TAMBAH PRODUK
            </button>
        </a>
    </div>

    {{-- Kolom Cari Produk --}}
<div class="mb-4">
    <form method="GET" action="{{ route('produk-penjual.index') }}" class="flex gap-2 max-w-xs">
        <input type="text" name="cari" placeholder="Cari produk" value="{{ request('cari') }}"
               class="border rounded-md px-4 py-2 w-full">
        <button type="submit" class="bg-blue-200 px-4 rounded hover:bg-blue-300">Cari</button>
    </form>
</div>


    @if (session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-2">No.</th>
                <th class="border px-2 py-2">Produk</th>
                <th class="border px-2 py-2">Kategori</th>
                <th class="border px-2 py-2">Deskripsi</th>
                <th class="border px-2 py-2">Harga</th>
                <th class="border px-2 py-2">Stok</th>
                <th class="border px-2 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $index => $produk)
            <tr>
                <td class="border px-2 py-2">{{ $index + 1 }}</td>
                <td class="border px-2 py-2 flex items-center gap-2">
                    @if($produk->gambar)
                        <img src="{{ asset($produk->gambar) }}" class="w-10 h-10 object-cover rounded" alt="Gambar Produk">
                    @endif
                    {{ $produk->nama }}
                </td>
                <td class="border px-2 py-2">{{ $produk->kategori }}</td>
                <td class="border px-2 py-2">{{ $produk->deskripsi }}</td>
                <td class="border px-2 py-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="border px-2 py-2">{{ $produk->stok }}</td>
                <td class="border px-2 py-2 flex gap-2">
                    <a href="{{ route('produk-penjual.edit', $produk->id_produk) }}" class="bg-green-200 px-2 py-1 rounded">✔ Edit</a>
                    <form action="{{ route('produk-penjual.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Yakin hapus produk?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-200 px-2 py-1 rounded">✖ Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
