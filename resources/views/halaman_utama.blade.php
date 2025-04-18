<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Halaman Utama Pembeli</title>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="bg-gray-100 font-serif">
    <section class="relative h-[55vh] bg-cover bg-center text-white flex items-center bg-[url('{{ asset('images/latar.png') }}')]">
        <nav class="absolute top-6 left-1/2 transform -translate-x-1/2 px-8 py-4 bg-white bg-opacity-70 shadow rounded-full flex justify-between items-center w-[90%] max-w-6xl h-16">
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

        <div class="text-left text-white px-6 max-w-2xl mt-12 ml-16">
            <h1 class="text-5xl font-bold mb-4">B L O O M I F Y</h1>
            <p class="text-xl leading-relaxed">
                Ingin mengirimkan ucapan selamat, atau cinta dan dukunganmu? <br>
                Apa pun pesan yang ingin kamu sampaikan, kami memiliki buket <br>
                yang tepat untukmu.
            </p>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">
            <div class="text-center bg-gray-50 rounded-lg shadow p-6">
                <div class="text-4xl mb-4">🌼</div>
                <h3 class="font-bold text-lg mb-2">RANGKAIAN CINTA &amp; KEINDAHAN</h3>
                <p class="text-gray-600">
                    Kombinasi sempurna dari bunga pilihan yang dirangkai dengan penuh ketulusan.
                </p>
            </div>

            <div class="text-center bg-gray-50 rounded-lg shadow p-6">
                <div class="text-4xl mb-4">🌺</div>
                <h3 class="font-bold text-lg mb-2">BUNGA DENGAN KUALITAS TERBAIK</h3>
                <p class="text-gray-600">
                    Setiap bunga dipilih dengan teliti untuk menghadirkan keindahan sempurna.
                </p>
            </div>

            <div class="text-center bg-gray-50 rounded-lg shadow p-6">
                <div class="text-4xl mb-4">💐</div>
                <h3 class="font-bold text-lg mb-2">BUNGA TERINDAH UNTUK<br />SETIAP MOMEN</h3>
                <p class="text-gray-600">
                    Berikan kesan istimewa untuk setiap kesempatan dengan buket terbaik dari kami.
                </p>
            </div>
        </div>
    </section>

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
                        <a href="tentang_kami" class="flex items-center text-gray-600 hover:text-gray-800">
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