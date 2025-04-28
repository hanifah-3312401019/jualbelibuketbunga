<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bloomify Buyer')</title>

    <!-- Tailwind + Flowbite + Font Awesome CDN -->
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-gray-100 font-serif">

<!-- Navbar -->
<section class="relative h-[70vh] bg-cover bg-center text-white flex items-center bg-[url('{{ asset('images/banner.png') }}')]">
    <nav class="absolute top-6 left-1/2 transform -translate-x-1/2 px-8 py-4 bg-white bg-opacity-70 shadow rounded-full flex justify-between items-center w-[90%] max-w-6xl h-16">
        <div class="flex items-center">
            <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify" class="h-20 w-auto" />
        </div>

        <ul class="flex space-x-8 text-gray-900 font-medium">
            <li><a href="halaman_utama" class="hover:text-pink-600">Halaman Utama</a></li>
            <li><a href="produk" class="hover:text-pink-600">Produk</a></li>
            <li><a href="hubungi_kami" class="hover:text-pink-600">Hubungi Kami</a></li>
            <li><a href="tentang_kami" class="hover:text-pink-600">Tentang Kami</a></li>
        </ul>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Cari..." class="pl-4 pr-10 py-2 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-300" />
                <i class="fa-solid fa-magnifying-glass absolute right-3 top-3 text-gray-700"></i>
            </div>
            <a href="/keranjang" title="Keranjang">
                <i class="fa-solid fa-cart-shopping text-xl text-black cursor-pointer"></i>
            </a>
            <a href="/login" title="Akun">
                <i class="fa-solid fa-user text-xl text-black cursor-pointer"></i>
            </a>
            <a href="/logout" title="Logout">
                <i class="fa-solid fa-right-from-bracket text-xl text-black cursor-pointer"></i>
            </a>
        </div>
    </nav>
</section>
