<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Penjualan</title>
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
    <aside class="w-1/5 h-screen bg-gradient-to-b from-purple-100 to-white p-4">
        <div class="mb-0 mt-0 text-center">
            <img src="{{ asset('images/Bloomify.png') }}" class="w-38 mx-auto mb-0">
        </div>
        <nav class="space-y-4 text-sm">
            <a href="{{ route('dashboard.penjual') }}" class="block bg-pink-100 px-4 py-2 rounded-md">🏠 DASHBOARD</a>
            <a href="{{ route('produk.index') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📦 DAFTAR PRODUK</a>
            <a href="{{ route('rekap.penjualan') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📋 REKAP PENJUALAN</a>
            <a href="#" class="block bg-pink-100 px-4 py-2 rounded-md">🏷️ KATEGORI PRODUK</a>
        </nav>
    </aside>

    <!-- Konten -->
    <main class="w-4/5 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold flex items-center gap-2">
                📋 REKAP PENJUALAN
            </h1>
            <div class="flex gap-4 text-xl">
                <i class="fas fa-user"></i>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="w-full border text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-2 py-2">No.</th>
                        <th class="border px-2 py-2">Tanggal</th>
                        <th class="border px-2 py-2">Nama Produk</th>
                        <th class="border px-2 py-2">Harga Produk</th>
                        <th class="border px-2 py-2">Jumlah Produk</th>
                        <th class="border px-2 py-2">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekapPenjualan as $index => $rekap)
                    <tr>
                        <td class="border px-2 py-2">{{ $index + 1 }}</td>
                        <td class="border px-2 py-2">{{ \Carbon\Carbon::parse($rekap->tanggal)->format('d M Y') }}</td>
                        <td class="border px-2 py-2">{{ $rekap->nama_produk }}</td>
                        <td class="border px-2 py-2">Rp {{ number_format($rekap->harga_produk, 0, ',', '.') }}</td>
                        <td class="border px-2 py-2">{{ $rekap->jumlah_produk }}</td>
                        <td class="border px-2 py-2">Rp {{ number_format($rekap->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
