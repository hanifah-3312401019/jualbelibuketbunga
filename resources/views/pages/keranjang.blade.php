@include('components.navbar')

<!-- Keranjang -->
<main class="container mx-auto px-6 py-16 flex-grow">
  <form action="{{ route('keranjang.clear') }}" class="mb-6" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua item dari keranjang?')">
    @csrf
    <button class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300 shadow-md" type="submit">
      🗑️ Hapus Semua
    </button>
  </form>

  <h2 class="text-3xl font-bold mb-6 text-gray-800">🛒 Keranjang Belanja</h2>

  <!-- Form kirim ke checkout -->
  <form action="{{ route('checkout') }}" method="GET">
    <div class="overflow-x-auto rounded-lg shadow-lg">
      <table class="min-w-full bg-white divide-y divide-gray-200">
        <thead class="bg-gray-100 text-sm text-gray-700 uppercase tracking-wider">
          <tr class="text-center">
            <th class="py-3 px-4"><input type="checkbox" disabled /></th>
            <th class="py-3 px-4">Gambar</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Harga</th>
            <th class="py-3 px-4">Kuantitas</th>
            <th class="py-3 px-4">Total</th>
            <th class="py-3 px-4">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
          @foreach ($keranjang as $item)
          <tr class="text-center hover:bg-gray-50 transition">
            <td class="py-4 px-4">
              <input type="checkbox" name="keranjang_terpilih[]" value="{{ $item->id }}" checked>
            </td>
            <td class="py-4 px-4">
              <img alt="Gambar {{ $item->produk->nama }}" class="w-16 h-16 object-cover rounded shadow mx-auto" src="{{ asset($item->produk->gambar) }}"/>
            </td>
            <td class="py-4 px-4 font-medium">{{ $item->produk->nama }}</td>
            <td class="py-4 px-4 text-green-600 font-semibold">Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
            <td class="py-4 px-4">
              <form action="{{ route('keranjang.update', $item->id) }}" method="POST" class="flex justify-center items-center gap-2" onsubmit="return false;">
                @csrf
                @method('PUT')
                <button type="button" onclick="decreaseQty({{ $item->id }})" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                <input 
                  id="cartQuantity{{ $item->id }}" 
                  class="w-12 text-center border border-gray-300 rounded py-1" 
                  type="number" 
                  name="kuantitas" 
                  value="{{ $item->kuantitas }}" 
                  min="1" 
                  max="{{ $item->produk->stok }}" 
                  readonly>
                <button type="button" onclick="increaseQty({{ $item->id }}, {{ $item->produk->stok }})" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                <input type="hidden" name="update_url" value="{{ route('keranjang.update', $item->id) }}">
              </form>
            </td>
            <td class="py-4 px-4 font-semibold" id="totalHarga{{ $item->id }}" data-harga="{{ $item->produk->harga }}">
              Rp{{ number_format($item->produk->harga * $item->kuantitas, 0, ',', '.') }}
            </td>
            <td class="py-4 px-4">
              <form action="{{ route('pages.keranjang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini dari keranjang?')">
                @csrf
                @method('DELETE')
                <button class="font-bold text-red-700 hover:underline text-sm" type="submit">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Tombol Checkout -->
    <div class="mt-8 text-right">
      <button class="inline-block bg-pink-600 text-white px-6 py-3 rounded-full hover:bg-pink-700 transition duration-300 shadow-lg" type="submit">
        Lanjut ke Checkout →
      </button>
    </div>
  </form>
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
      sendUpdate(id, qty);
    } else {
      alert("Jumlah melebihi stok tersedia!");
    }
  }

  function decreaseQty(id) {
    let qtyInput = document.getElementById('cartQuantity' + id);
    let qty = parseInt(qtyInput.value);
    if (qty > 1) {
      qty--;
      qtyInput.value = qty;
      updateTotal(id, qty);
      sendUpdate(id, qty);
    }
  }

  function updateTotal(id, qty) {
    const hargaSatuan = parseInt(document.getElementById('totalHarga' + id).getAttribute('data-harga'));
    const totalHargaDisplay = document.getElementById('totalHarga' + id);
    const harga = hargaSatuan * qty;
    totalHargaDisplay.textContent = 'Rp' + harga.toLocaleString('id-ID');
  }

  function sendUpdate(id, qty) {
  const form = document.querySelector(`form[action$="/${id}"]`);
  const token = form.querySelector('input[name="_token"]').value;
  const url = form.querySelector('input[name="update_url"]').value;

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
      'X-Requested-With': 'XMLHttpRequest',
    },
    body: JSON.stringify({
      _method: 'PUT',
      kuantitas: qty
    })
  })
  .then(response => response.json())
  .then(data => {
    if (!data.success) {
      alert('Gagal memperbarui kuantitas.');
    }
  })
  .catch(() => alert('Terjadi kesalahan jaringan.'));
}

</script>
</body>

