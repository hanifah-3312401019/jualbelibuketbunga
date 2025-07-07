@include('components.navbar')

<div class="max-w-5xl mx-auto py-16 px-6 grid md:grid-cols-2 gap-12 items-start">
    <!-- Gambar Buket -->
    <div class="flex justify-center">
      <img src="{{ asset($produk->gambar) }}" alt="Produk {{ $produk->nama }}" class="w-full max-w-sm rounded-md shadow" />
    </div>

    <!-- Detail Produk -->
    <div>
      <h1 class="text-3xl font-bold mb-4">{{ $produk->nama }}</h1>
      <p class="text-2xl text-gray-800 font-semibold mb-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
      <p class="text-sm text-gray-500 mb-6">Stok tersedia: {{ $produk->stok }}</p>
      <p class="text-gray-600 mb-6 text-justify">
        {{ $produk->deskripsi }}
      </p>

      <!-- Jumlah -->

      <form action="{{ route('pages.keranjang.store') }}" method="POST">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id_produk }}">
        <input type="hidden" id="qty" name="quantity" value="1">
        <div class="flex items-center space-x-3 mt-4">

    <!-- Tombol jumlah -->
    <div class="flex items-center border rounded-full overflow-hidden">
      <button type="button" onclick="decreaseQty()" class="w-8 h-8 text-sm font-bold text-gray-600 hover:bg-gray-100">−</button>
      <span id="quantity" class="px-3 font-semibold text-sm">1</span>
      <button type="button" onclick="increaseQty()" class="w-8 h-8 text-sm font-bold text-gray-600 hover:bg-gray-100">+</button>
    </div>

    <!-- Tombol tambah ke keranjang -->
    <button type="submit" class="bg-pink-500 hover:bg-pink-800 text-white text-sm px-4 py-2 rounded-full font-semibold whitespace-nowrap">
      Masukkan ke keranjang
    </button>
  </div>
</form>
</div>
</div>

<script>
    let quantity = 1;
    const quantityDisplay = document.getElementById('quantity');
    const qtyInput = document.getElementById('qty');

    function increaseQty() {
      quantity++;
      quantityDisplay.textContent = quantity;
      qtyInput.value = quantity;
    }

    function decreaseQty() {
      if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
        qtyInput.value = quantity;
      }
    }
</script>

@include('components.footer_')

