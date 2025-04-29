<!-- Footer -->
<footer class="bg-white pt-12 pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Kolom Ikuti Kami -->
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
                    <a href="{{ url('hubungi_kami') }}" class="flex items-center text-gray-600 hover:text-gray-800">
                        <i class="fas fa-info-circle mr-2"></i> Hubungi Kami
                    </a>
                </li>
                <li>
                    <a href="{{ url('tentang_kami') }}" class="flex items-center text-gray-600 hover:text-gray-800">
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
