<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Abhaya Libre', serif;
        }
    </style>
</head>
<body class="p-10 bg-white">
    <h1 class="text-3xl font-bold mb-6">➕ Tambah Produk</h1>

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div>
            <label class="block font-medium">Harga</label>
            <input type="number" name="harga" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Stok</label>
            <input type="number" name="stok" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Gambar Produk</label>
            <input type="file" name="gambar" class="w-full">
        </div>

        <button type="submit" class="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-4 py-2 rounded">
            Simpan Produk
        </button>
    </form>
</body>
</html>