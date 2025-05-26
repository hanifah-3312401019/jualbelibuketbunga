@extends('layouts.penjual')

@section('title', 'Daftar Produk')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold flex items-center gap-2">📦 DAFTAR PRODUK</h1>
    </div>

    <div class="mb-4">
        <a href="{{ route('produk-penjual.create') }}">
            <button class="bg-pink-200 text-black py-1 px-3 rounded hover:bg-pink-300">
         ＋ TAMBAH PRODUK
            </button>
        </a>
    </div>

    <div class="mb-4">
        <input type="text" placeholder="Cari produk..." class="border rounded-md px-4 py-2 w-1/3">
    </div>

    <table class="w-full border text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-2">No.</th>
                <th class="border px-2 py-2">Nama Produk</th>
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
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="w-10 h-10 object-cover rounded">
                    @endif
                    {{ $produk->nama }}
                </td>
                <td class="border px-2 py-2">{{ $produk->deskripsi }}</td>
                <td class="border px-2 py-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="border px-2 py-2">{{ $produk->stok }}</td>
                <td class="border px-2 py-2 flex gap-2">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="bg-green-200 px-2 py-1 rounded">✔ Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk?')">
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
