<body class="bg-gray-100 font-serif min-h-screen flex flex-col">

@include('components.navbar')

<!-- Keranjang -->
<main class="container mx-auto px-6 py-16 flex-grow">
  <form action="{{ route('keranjang.clear') }}" class="mb-4" method="POST">
    @csrf
    <button class="px-4 py-2 bg-red-500 text-white rounded" type="submit">Hapus Semua</button>
  </form>

  <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
      <thead class="bg-gray-100 text-sm text-gray-700 font-semibold">
        <tr class="text-center">
          <th class="py-3 px-4"><input disabled type="checkbox"/></th>
          <th class="py-3 px-4">Gambar Produk</th>
          <th class="py-3 px-4">Nama Produk</th>
          <th class="py-3 px-4">Harga</th>
          <th class="py-3 px-4">Kuantitas</th>
          <th class="py-3 px-4">Total Harga</th>
          <th class="py-3 px-4">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($keranjang as $item)
        <tr class="border-t text-center">
          <td class="py-4 px-4">
            <input checked type="checkbox"/>
          </td>
          <td class="py-4 px-4">
            <img alt="Gambar {{ $item->produk->nama }}" class="w-16 h-16 object-cover rounded mx-auto" src="{{ asset($item->produk->gambar) }}"/>
          </td>
          <td class="py-4 px-4">{{ $item->produk->nama }}</td>
          <td class="py-4 px-4">Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
          <td class="py-4 px-4">
            <form action="{{ route('keranjang.update', $item->id) }}" method="POST">
              @csrf
              @method('PUT')
              <input class="w-16 text-center border rounded" max="{{ $item->produk->stok }}" min="1" name="kuantitas" type="number" value="{{ $item->kuantitas }}"/>
              <button class="ml-2 text-blue-500" type="submit">Update</button>
            </form>
          </td>
          <td class="py-4 px-4" id="totalHarga{{ $item->id }}" data-harga="{{ $item->produk->harga }}">
            Rp{{ number_format($item->produk->harga * $item->kuantitas, 0, ',', '.') }}
          </td>
          <td class="py-4 px-4">
            <form action="{{ route('pages.keranjang.destroy', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="text-red-500 hover:underline" type="submit">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Tombol Checkout -->
  <div class="mt-6 text-right">
    <a class="bg-pink-500 text-white px-6 py-3 rounded-full hover:bg-pink-600 transition duration-300" href="/checkout">Checkout</a>
  </div>
</main>

@include('components.footer_')

<!-- Script Interaktif -->
<script>
  function increaseQty(id, stok) {
    let qtyInput = document.getElementById('cartQuantity' + id);
    let qty = parseInt(qtyInput.value);
    if (qty < stok) {
      qty++;
      qtyInput.value = qty;
      updateTotal(id, qty);
    }
  }

  function decreaseQty(id) {
    let qtyInput = document.getElementById('cartQuantity' + id);
    let qty = parseInt(qtyInput.value);
    if (qty > 1) {
      qty--;
      qtyInput.value = qty;
      updateTotal(id, qty);
    }
  }

  function updateTotal(id, qty) {
    const hargaSatuan = parseInt(document.getElementById('totalHarga' + id).getAttribute('data-harga'));
    const totalHargaDisplay = document.getElementById('totalHarga' + id);
    const harga = hargaSatuan * qty;
    totalHargaDisplay.textContent = 'Rp' + harga.toLocaleString('id-ID');
  }
</script>
</body>

