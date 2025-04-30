@include('components.navbar')

  <div class="max-w-5xl mx-auto py-16 px-6 grid md:grid-cols-2 gap-12 items-start">
    <!-- Gambar Buket -->
    <div class="flex justify-center">
      <img src="{{ asset('images/bukettulip.png') }}" alt="Produk Buket" class="w-full max-w-sm rounded-md shadow" />
    </div>

    <!-- Detail Produk -->
    <div>
      <h1 class="text-3xl font-bold mb-4">Buket Bunga Tulip Biru</h1>
      <p class="text-2xl text-gray-800 font-semibold mb-6">Rp190.000</p>
      <p class="text-gray-600 mb-6 text-justify">
        Buket Bunga Tulip Biru adalah simbol dari ketenangan, kepercayaan, dan harapan yang dalam. Dihadirkan dengan 15 tangkai tulip biru berkualitas tinggi, 
        buket ini memberikan sentuhan elegan dan menenangkan yang cocok untuk mengungkapkan rasa cinta, perhatian, maupun doa terbaik kepada orang tersayang.
        Cocok untuk hadiah ulang tahun, ucapan semangat, atau momen spesial lainnya.
      </p>


      <!-- Jumlah -->
      <div class="mb-6">
        <label class="block text-sm font-medium mb-1">Jumlah Barang</label>
        <div class="flex items-center space-x-4">
          <button onclick="decreaseQty()" class="w-8 h-8 border rounded-full flex justify-center items-center text-lg">-</button>
          <span id="quantity" class="text-lg font-semibold">1</span>
          <button onclick="increaseQty()" class="w-8 h-8 border rounded-full flex justify-center items-center text-lg">+</button>
        </div>
      </div>

      <!-- Tombol -->
      <button onclick="addToCart()" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded font-semibold">
        Tambahkan ke Keranjang
      </button>
    </div>
  </div>

  
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
      alert("Produk berhasil ditambahkan ke keranjang.");
    }
  </script>

@include('components.footer_')

</body>
</html>
