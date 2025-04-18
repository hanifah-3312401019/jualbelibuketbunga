<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Seller</title>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
            <img src="{{ asset('images/Bloomify.png') }}" class="mx-auto w-24 mb-2">
            <h1 class="text-xl font-bold">Bloomify</h1>
        </div>
        <nav class="space-y-4 text-sm">
            <a href="{{ route('dashboard.penjual') }}" class="block bg-pink-100 px-4 py-2 rounded-md">🏠 DASHBOARD</a>
            <a href="{{ route('produk.index') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📦 DAFTAR PRODUK</a>
            <a href="{{ route('rekap.penjualan') }}" class="block bg-pink-100 px-4 py-2 rounded-md">📋 REKAP PENJUALAN</a>
            <a href="#" class="block bg-pink-100 px-4 py-2 rounded-md">🏷️ KATEGORI PRODUK</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="w-4/5 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-bold flex items-center gap-2">🏠 DASHBOARD</h2>
            <div class="flex gap-4 text-xl">
                <i class="ph ph-user-circle"></i>
                <a href="/logout" class="ph ph-sign-out hover:text-red-500 transition"></a>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-2 gap-6">
            <div class="bg-purple-100 p-6 rounded-2xl shadow flex flex-col items-start">
                <div class="flex items-center gap-2 mb-2 text-lg font-semibold">
                    <i class="ph ph-package"></i>
                    PRODUK
                </div>
                <p class="text-sm font-medium">JUMLAH : 100</p>
            </div>
            <div class="bg-purple-100 p-6 rounded-2xl shadow flex flex-col items-start">
                <div class="flex items-center gap-2 mb-2 text-lg font-semibold">
                    <i class="ph ph-clipboard-text"></i>
                    REKAPITULASI PENJUALAN
                </div>
                <p class="text-sm font-medium">JUMLAH : 100</p>
            </div>
        </div>
    </main>

</body>
</html>
