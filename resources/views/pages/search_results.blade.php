@include('components.navbar')

<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-center mb-4">
                Hasil Pencarian untuk "{{ $query }}"
            </h1>
            <p class="text-center text-gray-600">
                Ditemukan {{ $count }} produk
            </p>
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-transparent backdrop-blur-sm max-w-xs mx-auto p-3 rounded-lg transition-transform duration-300 hover:scale-105 hover:shadow-lg">
                        <img
                            src="{{ asset($product->gambar) }}"
                            alt="{{ $product->nama }}"
                            class="w-full h-auto object-contain rounded-md mb-3">
                        <h3 class="text-lg font-semibold text-black">{{ $product->nama }}</h3>
                        <p class="text-gray-700">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                        @if($product->kategori)
                            <p class="text-sm text-gray-500 mb-2">{{ $product->kategori }}</p>
                        @endif
                        <div class="mt-3 w-full flex justify-between gap-12 items-center">
                            <a
                                href="{{ route('produk.show', $product->id_produk) }}"
                                class="flex-1 px-5 py-2 bg-pink-400 text-white rounded-full text-center hover:bg-pink-500 transition">
                                Detail
                            </a>
                            <form action="{{ route('pages.keranjang.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $product->id_produk }}">
                                <button
                                    type="submit"
                                    class="w-10 h-10 flex items-center justify-center bg-pink-500 text-white rounded-full hover:bg-pink-600 transition">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold mb-2">Produk tidak ditemukan</h3>
                <p class="text-gray-600 mb-6">
                    Maaf, kami tidak dapat menemukan produk yang sesuai dengan pencarian "{{ $query }}"
                </p>
                <a href="{{ url('halaman_utama') }}"
                   class="inline-block px-6 py-3 bg-pink-500 text-white rounded-full hover:bg-pink-600 transition">
                    Kembali ke Halaman Utama
                </a>
            </div>
        @endif
    </div>
</section>

@include('components.footer_')