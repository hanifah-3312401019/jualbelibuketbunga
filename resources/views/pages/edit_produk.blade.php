@extends('layouts.penjual')

@section('title', 'Edit Produk')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk-penjual.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="gambar" class="block font-semibold mb-1">Gambar Produk</label>
            @if($produk->gambar)
                <img src="{{ asset($produk->gambar) }}" alt="Gambar Produk" class="w-20 h-20 object-cover mb-2">
            @endif
            <input type="file" name="gambar" id="gambar" accept="image/*" class="border rounded px-3 py-2 w-full">
            <small>Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="mb-4">
            <label for="nama" class="block font-semibold mb-1">Nama Produk</label>
            <input type="text" name="nama" id="nama" required class="border rounded px-3 py-2 w-full" value="{{ old('nama', $produk->nama) }}">
        </div>

        <div class="mb-4">
            <label for="kategori" class="block font-semibold mb-1">Kategori</label>
            <input type="text" name="kategori" id="kategori" required class="border rounded px-3 py-2 w-full" value="{{ old('kategori', $produk->kategori) }}">
        </div>

        <div class="mb-4">
            <label for="harga" class="block font-semibold mb-1">Harga</label>
            <input type="number" name="harga" id="harga" required class="border rounded px-3 py-2 w-full" value="{{ old('harga', $produk->harga) }}">
        </div>

        <div class="mb-4">
            <label for="stok" class="block font-semibold mb-1">Stok</label>
            <input type="number" name="stok" id="stok" required class="border rounded px-3 py-2 w-full" value="{{ old('stok', $produk->stok) }}">
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="border rounded px-3 py-2 w-full">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-pink-200 text-black py-2 px-4 rounded hover:bg-pink-300">Update</button>
            <a href="{{ route('produk-penjual.index') }}" class="bg-gray-300 py-2 px-4 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
@endsection
