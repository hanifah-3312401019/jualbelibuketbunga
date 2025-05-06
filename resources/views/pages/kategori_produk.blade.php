@extends('layouts.penjual')

@section('title', 'Kategori Produk')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold flex items-center gap-2">
        <i class="fa-solid fa-bars"></i> KATEGORI PRODUK
    </h1>
</div>

<div class="mb-6">
    <a href="#" class="inline-flex items-center gap-2 bg-pink-100 hover:bg-pink-200 text-black font-semibold px-4 py-2 rounded-full">
        <i class="fa-solid fa-plus"></i> TAMBAH KATEGORI
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full border text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-center">KATEGORI</th>
                <th class="border px-4 py-2 text-center">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-center">MATAHARI</td>
                <td class="border px-4 py-2 text-center flex justify-center gap-2">
                    <a href="#" class="bg-green-300 hover:bg-green-400 text-black px-2 py-1 rounded">
                        <i class="fa-solid fa-pen-to-square"></i> UBAH
                    </a>
                    <a href="#" class="bg-red-400 hover:bg-red-500 text-white px-2 py-1 rounded">
                        <i class="fa-solid fa-trash"></i> HAPUS
                    </a>
                </td>
            </tr>
            <!-- Tambahkan baris lain kalau mau -->
            <tr>
                <td class="border px-4 py-6"></td>
                <td class="border px-4 py-6"></td>
            </tr>
            <tr>
                <td class="border px-4 py-6"></td>
                <td class="border px-4 py-6"></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
