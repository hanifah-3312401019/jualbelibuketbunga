@include('components.navbarproduk')

<!-- Main content area -->
<main class="flex-grow flex items-center justify-center">
    <div class="container mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center mb-8">.ೃ࿔*°❀⋆ Produk Buket Bunga! °❀⋆.ೃ࿔*</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div data-aos="fade-up" class="bg-transparent backdrop-blur-sm max-w-xs mx-auto p-3 rounded-lg shadow hover:shadow-lg transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama }}" class="w-full h-auto object-contain rounded-md mb-3">
                    <h3 class="text-lg font-semibold text-black">{{ $product->nama }}</h3>
                    <p class="text-gray-700">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                    <div class="mt-3 w-full flex justify-between gap-12 items-center">
                        <a href="{{ route('produk.show', $product->id_produk) }}" class="flex-1 px-5 py-2 bg-pink-400 text-white rounded-full text-center hover:bg-pink-500 transition">
                            Detail
                        </a>
                        <form action="{{ route('pages.keranjang.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $product->id_produk }}">
                            <button type="submit" class="w-10 h-10 flex items-center justify-center bg-pink-500 text-white rounded-full hover:bg-pink-600 transition">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

@include('components.footer_')

