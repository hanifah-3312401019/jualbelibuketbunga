@extends('layouts.penjual')

@section('title', 'Kategori Produk')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Kategori Produk</h1>
</div>

{{-- Tombol Tambah Kategori --}}
<div class="mb-6">
    <a href="{{ route('kategori.create') }}" class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white font-semibold px-4 py-2 rounded-full shadow transition">
        <i class="fa-solid fa-plus"></i> Tambah Kategori
    </a>
</div>

{{-- Notifikasi Sukses --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded shadow-sm">
        {{ session('success') }}
    </div>
@endif

{{-- Tabel Kategori --}}
<div class="overflow-x-auto bg-white rounded-xl shadow">
    <table class="min-w-full text-sm text-gray-800">
        <thead class="bg-gray-100 uppercase text-xs font-semibold text-gray-600">
            <tr>
                <th class="px-6 py-4 text-center">Kategori</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-center font-medium">{{ $kategori->nama }}</td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center items-center gap-3">
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="inline-flex items-center px-3 py-1 text-sm font-semibold bg-green-200 hover:bg-green-300 text-green-900 rounded-full transition">
                            <i class="fa-solid fa-pen-to-square mr-1"></i> Ubah
                        </a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 text-sm font-semibold bg-red-400 hover:bg-red-500 text-white rounded-full transition">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="px-6 py-6 text-center text-gray-500">Belum ada kategori ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
