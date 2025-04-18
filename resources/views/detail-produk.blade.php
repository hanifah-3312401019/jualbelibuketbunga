<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk - Bloomify</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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

  <!-- Detail Produk -->
  <main class="container mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-12">
    <div class="flex justify-center">
      <img src="{{ asset('images/bukettulip.png') }}" alt="Buket Tulip Biru" class="w-80">
    </div>
    <div>
      <h2 class="text-3xl font-bold mb-4">Buket Bunga Tulip Biru</h2>
      <p class="text-green-600 text-lg font-semibold mb-4">Rp190.000</p>
      <p class="text-gray-700 mb-6 leading-relaxed">
        Buket Bunga Tulip Biru membawa makna yang unik dan mendalam. Dalam simbolisme bunga, tulip berwarna biru merepresentasikan ketenangan, kepercayaan, harapan, dan mimpi yang belum terwujud.
      </p>
      <p class="text-gray-700 mb-8 leading-relaxed">
        Buket ini terdiri dari 15 tangkai tulip biru artificial berkualitas tinggi yang menyerupai tampilan bunga asli dengan tekstur real-touch.
      </p>

      <div class="flex items-center mb-6 gap-4">
        <button type="button" onclick="decreaseQty()" class="flex items-center justify-center w-8 h-8 border rounded-full">-</button>
        <span id="quantity" class="text-lg">1</span>
        <button type="button" onclick="increaseQty()" class="flex items-center justify-center w-8 h-8 border rounded-full">+</button>
      </div>

      <button onclick="addToCart()" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg">
        Beli Sekarang
      </button>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white pt-12 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Ikuti Kami -->
            <div class="flex flex-col">
                <h4 class="font-semibold text-gray-700 mb-4">IKUTI KAMI</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                            <i class="fab fa-facebook-square mr-2"></i> Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                            <i class="fab fa-instagram mr-2"></i> Instagram
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                            <i class="fab fa-youtube mr-2"></i> YouTube
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Kolom Informasi -->
            <div class="flex flex-col">
                <h4 class="font-semibold text-gray-700 mb-4">INFORMASI</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                            <i class="fas fa-info-circle mr-2"></i> Hubungi Kami
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                            <i class="fas fa-info-circle mr-2"></i> Tentang Kami
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Kolom Kontak -->
            <div class="bg-gray-50 rounded-2xl shadow-md p-6">
                <h4 class="font-semibold text-gray-700 mb-4">BLOOMIFY</h4>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="break-words">123 Bloom Street, Flower City, 56789</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-2"></i>
                        (+62) 123-456-7890
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:pblbloomify@gmail.com" class="hover:text-gray-800">pblbloomify@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center mt-8 text-gray-500">
            © 2025 Bloomify. Hak Cipta Dilindungi.
        </div>
    </footer>

  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

  <!-- Interaktif Tambahan -->
  <script>
    let quantity = 1;
    const quantityDisplay = document.getElementById('quantity');

    function increaseQty() {
      quantity++;
      quantityDisplay.textContent = quantity;
    }

    function decreaseQty() {
      if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
      }
    }

    function addToCart() {
      alert("Berhasil Ditambahkan ke Keranjang");
    }
  </script>

</body>
</html>
