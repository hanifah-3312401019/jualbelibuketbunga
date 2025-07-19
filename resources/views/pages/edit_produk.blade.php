@extends('layouts.penjual')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Produk</h1>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 border border-red-300 rounded-xl">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk-penjual.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                @if($produk->gambar)
                    <img src="{{ asset($produk->gambar) }}" alt="Gambar Produk" class="w-24 h-24 object-cover rounded-lg shadow mb-2">
                @endif
                <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full px-4 py-2 border rounded-lg shadow-sm file:bg-pink-100 file:text-pink-700">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $produk->nama) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
            </div>

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $produk->kategori) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
            </div>

            <div>
                <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-300">
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-300">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-xl hover:bg-pink-600 transition">Update</button>
                <a href="{{ route('produk-penjual.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-xl hover:bg-gray-300 transition">Batal</a>
            </div>
        </form>
    </div>
@endsection
