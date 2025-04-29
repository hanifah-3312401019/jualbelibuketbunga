<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang - Bloomify</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
  <header class="relative">
    <img src="{{ asset('images/latar.png') }}" alt="Header" class="w-full h-96 object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-20"></div>

    <div class="absolute top-6 left-6 right-6 bg-white bg-opacity-70 backdrop-blur-md rounded-full flex items-center justify-between px-6 py-0.5 shadow-lg">
      <div class="flex items-center">
        <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-16 mr-4">
      </div>

      <nav class="flex gap-8 text-gray-700 font-semibold text-sm">
        <a href="#" class="hover:underline text-center">Halaman Utama</a>
        <a href="#" class="hover:underline text-center">Produk</a>
        <a href="#" class="hover:underline text-center">Hubungi Kami</a>
        <a href="#" class="hover:underline text-center">Tentang Kami</a>
      </nav>

      <div class="flex items-center gap-4">
        <div class="relative">
          <input type="text" class="rounded-full pl-10 pr-4 py-2 text-sm text-gray-900" placeholder="Cari..." />
          <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
        <button class="text-gray-700">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h12a1 1 0 001-1V6a1 1 0 00-1-1H6m6 16a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </button>
        <button class="text-gray-700">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.09 7.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </button>
        <button class="text-gray-700">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Keranjang -->
  <main class="container mx-auto px-6 py-16">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-sm text-gray-700 font-semibold">
          <tr class="text-center">
            <th class="py-3 px-4">
              <input type="checkbox" disabled>
            </th>
            <th class="py-3 px-4">Gambar Produk</th>
            <th class="py-3 px-4">Nama Produk</th>
            <th class="py-3 px-4">Harga</th>
            <th class="py-3 px-4">Kuantitas</th>
            <th class="py-3 px-4">Total Harga</th>
            <th class="py-3 px-4">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t text-center">
            <td class="py-4 px-4">
              <input type="checkbox" checked>
            </td>
            <td class="py-4 px-4">
              <img src="{{ asset('images/bukettulip.png') }}" alt="Buket Tulip Biru" class="w-16 h-16 object-cover rounded mx-auto">
            </td>
            <td class="py-4 px-4">Buket Bunga Tulip Biru</td>
            <td class="py-4 px-4">Rp190.000</td>
            <td class="py-4 px-4">
              <div class="flex items-center justify-center">
                <button onclick="decreaseQty()" class="w-8 h-8 border rounded-l flex items-center justify-center">-</button>
                <input id="cartQuantity" type="text" value="1" readonly class="w-10 text-center border-t border-b">
                <button onclick="increaseQty()" class="w-8 h-8 border rounded-r flex items-center justify-center">+</button>
              </div>
            </td>
            <td class="py-4 px-4" id="totalHarga">Rp190.000</td>
            <td class="py-4 px-4">
              <button class="text-red-500 hover:underline">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Tombol Checkout -->
    <div class="mt-6 text-right">
      <a href="/checkout" class="bg-blue-500 text-white px-6 py-3 rounded-full hover:bg-blue-600 transition duration-300">Checkout</a>
    </div>
  </main>

  <!-- Script Interaktif -->
  <script>
    let qty = 1;
    const hargaSatuan = 190000;
    const qtyDisplay = document.getElementById('cartQuantity');
    const totalHargaDisplay = document.getElementById('totalHarga');

    function updateTotal() {
      totalHargaDisplay.textContent = 'Rp' + (qty * hargaSatuan).toLocaleString('id-ID');
    }

    function increaseQty() {
      qty++;
      qtyDisplay.value = qty;
      updateTotal();
    }

    function decreaseQty() {
      if (qty > 1) {
        qty--;
        qtyDisplay.value = qty;
        updateTotal();
      }
    }

    updateTotal();
  </script>

</body>
</html>