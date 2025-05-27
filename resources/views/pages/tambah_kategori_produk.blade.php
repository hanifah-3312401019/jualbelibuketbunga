@extends('layouts.penjual')

@section('title', 'Tambah Kategori Produk')

@section('content')
    <h1 class="text-2xl font-bold mb-4">＋ TAMBAH KATEGORI PRODUK</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block font-semibold mb-1">Nama Kategori</label>
            <input type="text" name="nama" id="nama" required class="border rounded px-3 py-2 w-full" value="{{ old('nama') }}">
        </div>
        <button type="submit" class="bg-pink-200 text-black py-2 px-4 rounded hover:bg-pink-300">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="bg-gray-300 py-2 px-4 rounded hover:bg-gray-400">Batal</a>
    </form>
@endsection
