@extends('layouts.penjual')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Produk </h1>

    <form>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" class="w-full border rounded px-3 py-2" value="Nama Produk Dummy" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea class="w-full border rounded px-3 py-2">Deskripsi produk dummy</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
            <input type="number" class="w-full border rounded px-3 py-2" value="100000" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
            <input type="number" class="w-full border rounded px-3 py-2" value="50" />
        </div>

        <div class="flex justify-end">
            <a href="{{ route('produk.index') }}" class="bg-pink-300 hover:bg-pink-400 text-black font-semibold px-4 py-2 rounded">
                Simpan Perubahan (Dummy)
            </a>
        </div>
    </form>
</div>
@endsection
