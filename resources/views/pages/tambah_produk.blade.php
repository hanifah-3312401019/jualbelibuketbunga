@extends('layouts.penjual')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Produk Baru</h2>
    <form action="{{ route('produk-penjual.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="border rounded w-full"></textarea>
        </div>
        <div class="mb-4">
            <label>Harga</label>
            <input type="number" name="harga" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label>Stok</label>
            <input type="number" name="stok" class="border rounded w-full" required>
        </div>
        <div class="mb-4">
            <label>Foto Produk (bisa lebih dari 1)</label>
            <input type="file" name="foto[]" multiple class="border rounded w-full">
        </div>
        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
