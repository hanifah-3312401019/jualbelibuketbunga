<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bloomify Seller')</title>

    <!-- Tailwind + Flowbite + Font Awesome CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Abhaya Libre Font -->
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Abhaya Libre', serif;
        }
    </style>
</head>
<body class="min-h-screen flex bg-white">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-[#E8E3EF] to-[#FFFFFF] shadow-md flex flex-col justify-between p-4">
        <div>
            <div class="text-center mb-6">
                <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify" class="mx-auto h-14 mb-2">
                <h1 class="text-xl font-bold">Bloomify</h1>
                <p class="text-xs text-gray-500">Bouquet Flowers</p>
            </div>
            <nav class="space-y-2 text-sm">
                <a href="{{ route('dashboard.penjual') }}" class="flex items-center px-4 py-2 bg-pink-100 rounded-lg font-medium text-gray-700">
                    <i class="fa-solid fa-house mr-3"></i> Dashboard
                </a>
                <a href="{{ route('produk.index') }}" class="flex items-center px-4 py-2 hover:bg-pink-100 rounded-lg text-gray-700">
                    <i class="fa-solid fa-box mr-3"></i> Daftar Produk
                </a>
                <a href="{{ route('rekap.index') }}" class="flex items-center px-4 py-2 hover:bg-pink-100 rounded-lg text-gray-700">
                    <i class="fa-solid fa-file-alt mr-3"></i> Rekapitulasi Penjualan
                </a>
                <a href="{{ route('kategori.index') }}" class="flex items-center px-4 py-2 hover:bg-pink-100 rounded-lg text-gray-700">
                    <i class="fa-solid fa-tags mr-3"></i> Kategori Produk
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Area -->
    <main class="flex-1 flex flex-col">
        <!-- Header/Navbar -->
        <header class="flex justify-between items-center px-6 py-4 bg-gradient-to-b from-[#E8E3EF] to-[#FFFFFF] shadow-md">
            <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('profil.penjual') }}">
                    <i class="fa-solid fa-user-circle text-2xl text-gray-700"></i>
                </a>
                <a href="/logout" class="text-xl text-gray-700 hover:text-red-500 transition">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </header>

        <!-- Halaman dinamis -->
        <section class="p-6">
            @yield('content')
        </section>
    </main>

</body>
</html>