<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-serif">
    <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/bgg.jpg') }}')]">
    <nav class="absolute top-6 left-1/2 transform -translate-x-1/2 px-8 py-4 bg-white bg-opacity-70 shadow rounded-full flex justify-between items-center w-[90%] max-w-6xl h-16 z-10">
            <div class="flex items-center">
                <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify" class="h-20 w-auto" />
            </div>
            <ul class="flex space-x-8 text-gray-900 font-medium">
                <li><a href="halaman_utama" class="hover:text-pink-600">Halaman Utama</a></li>
                <li><a href="produk" class="hover:text-pink-600">Produk</a></li>
                <li><a href="#" class="hover:text-pink-600">Hubungi Kami</a></li>
                <li><a href="tentang_kami" class="hover:text-pink-600">Tentang Kami</a></li>
            </ul>

            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Cari..."
                        class="pl-4 pr-10 py-2 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-300"/>
                    <i class="fa-solid fa-magnifying-glass absolute right-3 top-3 text-gray-700"></i>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fa-solid fa-cart-shopping text-xl text-black cursor-pointer" title="Keranjang"></i>
                    <i class="fa-solid fa-user text-xl text-black cursor-pointer" title="Akun"></i>
                    <a href="/logout" title="Logout">
                        <i class="fa-solid fa-right-from-bracket text-xl text-black cursor-pointer"></i>
                    </a>
                </div>
            </div>
        </nav>

        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-2">Tentang Kami</h1>
        </div>
    </section>
    <body class="bg-gray-50 font-sans min-h-screen">
  <div class="container mx-auto py-16 px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
      <div class="w-full flex justify-center">
        <img src="{{ asset('images/gambar1.jpg') }}" alt="Tentang Kami"
             class="w-80 h-80 object-cover shadow-lg rounded-3xl" />
      </div>

      <div>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug mb-4">
          Cerita Kami- <span class="text-pink-500">Bloomify</span>
        </h2>
        <p class="text-gray-600 mb-6 text-justify">
        Bloomify hadir sebagai wujud kecintaan kami terhadap keindahan dan kehangatan yang bisa dihadirkan oleh bunga. 
        Kami percaya bahwa setiap rangkaian bunga memiliki cerita dan makna yang bisa menyentuh hati, mempererat hubungan, dan memperindah momen-momen penting dalam hidup.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
        <ul class="space-y-2 list-disc pl-5">
            <li>Pilihan buket bunga siap kirim</li>
            <li>Proses cepat dan praktis</li>
            <li>Pengiriman tepat waktu</li>
        </ul>
        <ul class="space-y-2 list-disc pl-5">
            <li>Buket eksklusif dengan bunga segar</li>
            <li>Layanan pelanggan responsif</li>
            <li>Tanpa layanan custom</li>
        </ul>
        </div>
      </div>
    </div>
  </div>

<!-- Tim Pengembang -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-4">
      Meet Our <span class="text-pink-500">Development Team</span>
    </h2>
    <p class="text-gray-600 mb-10">
      Tim berbakat yang berada di balik aplikasi Bloomify.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      @foreach ($timPengembang as $anggota)
        <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition duration-300">
          <img src="{{ asset('images/' . $anggota['gambar']) }}" alt="{{ $anggota['nama'] }}" class="w-full h-64 object-cover" />
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $anggota['nama'] }}</h3>
            <p class="text-gray-500 text-sm">{{ $anggota['jabatan'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
</body>

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
</body>
</html>