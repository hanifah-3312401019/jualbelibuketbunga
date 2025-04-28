@include('components.navbar')

<body class="bg-gray-50 font-sans min-h-screen">

    <!-- Tentang Kami Section -->
    <div class="container mx-auto py-16 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="w-full flex justify-center">
                <img src="{{ asset('images/gambar1.jpg') }}" alt="Tentang Kami"
                     class="w-80 h-80 object-cover shadow-lg rounded-3xl" />
            </div>

            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug mb-4">
                    Cerita Kami - <span class="text-pink-500">Bloomify</span>
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

    <!-- Tim Pengembang Section -->
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

@include('components.footer_')
