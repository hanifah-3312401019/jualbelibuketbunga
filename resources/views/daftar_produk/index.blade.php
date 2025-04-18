<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Abhaya Libre', serif;
        }
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="w-1/5 h-screen bg-gradient-to-b from-purple-100 to-white p-6">
        <div class="mb-8 text-center">
            <img src="{{ asset('images/logo-bloomify.png') }}" class="w-38 mx-auto mb-0">
        </div>
        <nav class="space-y-4 text-sm">
            <a href="{{ route('dashboard') }}" class="block bg-pink-100 px-4 py-2 rounded-md">🏠 DASHBOARD</a>
            <a href="{{ route('produk.index') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📦 DAFTAR PRODUK</a>
            <a href="{{ route('rekap.penjualan') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📋 REKAP PENJUALAN</a>
            <a href="#" class="block bg-pink-100 px-4 py-2 rounded-md">🏷️ KATEGORI PRODUK</a>
        </nav>
    </aside>

    <!-- Konten -->
    <main class="w-4/5 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold flex items-center gap-2">📦 DAFTAR PRODUK</h1>
            <div class="flex gap-4 text-xl">
                <i class="fas fa-user"></i>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>

        <div class="mb-4">
            <a href="{{ route('produk.create') }}" class="bg-[#FBF0F0] text-black hover:bg-[#F2DADA] py-2 px-4 rounded-md">
                ➕ TAMBAH PRODUK
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
                            <img src="{{ asset('storage/' . $produk->gambar) }}" class="w-10 h-10 object-cover">
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
    </main>
</body>
</html>
