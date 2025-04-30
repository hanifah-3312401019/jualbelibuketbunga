<body class="bg-gray-100 font-serif min-h-screen flex flex-col">

@include('components.navbar')

  <!-- Keranjang -->
  <main class="container mx-auto px-6 py-16 flex-grow">
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
      <a href="/checkout" class="bg-pink-500 text-white px-6 py-3 rounded-full hover:bg-pink-600 transition duration-300">Checkout</a>
    </div>
  </main>

  @include('components.footer_')

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
