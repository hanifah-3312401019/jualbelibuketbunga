<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Bloomify</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
<header class="relative">
  <img src="{{ asset('images/latar.png') }}" alt="Header" class="w-full h-96 object-cover">
  <div class="absolute inset-0 bg-black bg-opacity-20"></div>

  <div class="absolute top-6 left-6 right-6 bg-white bg-opacity-70 backdrop-blur-md rounded-full flex items-center justify-between px-6 py-0.5 shadow-lg">
    <!-- Logo -->
    <div class="flex items-center">
      <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-16 mr-4">
    </div>

    <!-- Navigation -->
    <nav class="flex gap-8 text-gray-700 font-semibold text-sm">
      <a href="#" class="hover:underline text-center">Halaman Utama</a>
      <a href="#" class="hover:underline text-center">Produk</a>
      <a href="#" class="hover:underline text-center">Hubungi Kami</a>
      <a href="#" class="hover:underline text-center">Tentang Kami</a>
    </nav>

    <!-- Search and Icons -->
    <div class="flex items-center gap-4">
      <!-- Search Icon -->
      <div class="relative">
        <input type="text" class="rounded-full pl-10 pr-4 py-2 text-sm text-gray-900" placeholder="Cari..." />
        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
      </div>

      <!-- Cart Icon (Keranjang) -->
      <button class="text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h12a1 1 0 001-1V6a1 1 0 00-1-1H6m6 16a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
      </button>

      <!-- User Icon (Orang) -->
      <button class="text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.09 7.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </button>

      <!-- Logout Icon -->
      <button class="text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
        </svg>
      </button>
    </div>
  </div>
</header>



  <!-- Checkout Form -->
  <main class="container mx-auto px-6 py-16">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>
    <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-8 rounded-xl shadow-md">
      @csrf
      <!-- Informasi Pelanggan -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Informasi Pelanggan</h3>
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
          <input type="text" name="nama" class="w-full border rounded-lg px-4 py-2" required>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium mb-1">Alamat Pengiriman</label>
          <textarea name="alamat" rows="4" class="w-full border rounded-lg px-4 py-2" required></textarea>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Metode Pembayaran</label>
          <select name="pembayaran" class="w-full border rounded-lg px-4 py-2" required>
            <option value="">Pilih Metode</option>
            <option value="transfer">Transfer Bank</option>
            <option value="cod">Cash on Delivery</option>
            <option value="ewallet">E-Wallet</option>
          </select>
        </div>
      </div>

      <!-- Ringkasan Pesanan -->
      <div>
        <h3 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h3>
        <div class="flex items-center mb-4">
          <img src="{{ asset('images/bukettulip.png') }}" alt="Buket Tulip Biru" class="w-20 h-20 object-cover rounded-lg mr-4">
          <div>
            <p class="font-semibold">Buket Bunga Tulip Biru</p>
            <p class="text-sm text-gray-600">Qty: 1</p>
            <p class="text-sm font-semibold mt-1">Rp190.000</p>
          </div>
        </div>
        <div class="border-t pt-4 mt-4">
          <p class="text-lg font-bold">Total: Rp190.000</p>
          <button type="submit" class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg w-full">
            Konfirmasi dan Bayar
          </button>
        </div>
      </div>
    </form>
  </main>

</body>
</html>
