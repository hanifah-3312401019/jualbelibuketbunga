<!DOCTYPE html> 
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Bloomify</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<main class="container mx-auto px-8 py-10 bg-white rounded-xl shadow-md mt-10">
  <form action="{{ route('checkout.proses') }}" method="POST">
    @csrf

    <!-- ID keranjang yang dichecklist -->
    @foreach($keranjang as $item)
      <input type="hidden" name="keranjang_terpilih[]" value="{{ $item->id }}">
    @endforeach

    <!-- Back Button -->
    <div class="mb-4">
      <a href="{{ route('pages.keranjang.index') }}" class="inline-flex items-center text-pink-500 hover:text-pink-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Keranjang
      </a>
    </div>

    <div class="mb-6 flex items-center justify-between">
      <h2 class="text-2xl font-bold">Checkout</h2>
      <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-10">
    </div>

    <!-- Alamat Pengiriman -->
    <section class="mb-6">
      <h2 class="text-xl font-bold">Alamat Pengiriman</h2>
      <input type="text" name="nama_penerima" value="{{ old('nama_penerima', $user->nama) }}" class="w-full border px-4 py-2 mb-2 rounded" required>
      <input type="text" name="telepon" value="{{ old('telepon', $user->no_telepon) }}" class="w-full border px-4 py-2 mb-2 rounded" required>
      <textarea name="alamat" class="w-full border px-4 py-2 mb-2 rounded" required>{{ old('alamat', $user->alamat) }}</textarea>
    </section>

    <!-- Produk Dipesan -->
    <section class="overflow-x-auto mb-6">
      <h2 class="text-xl font-bold mb-2">Produk Dipesan</h2>
      <table class="w-full border border-black text-center">
        <thead class="bg-gray-100 font-bold">
          <tr>
            <th class="border border-black px-4 py-2">Produk</th>
            <th class="border border-black px-4 py-2">Harga</th>
            <th class="border border-black px-4 py-2">Jumlah</th>
            <th class="border border-black px-4 py-2">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0; @endphp
          @foreach($keranjang as $item)
            @php
              $subtotal = $item->produk->harga * $item->kuantitas;
              $total += $subtotal;
            @endphp
            <tr>
              <td class="border border-black px-4 py-2">
                {{ $item->produk->nama }}
                <input type="hidden" name="produk[]" value="{{ $item->produk->nama }}">
              </td>
              <td class="border border-black px-4 py-2">
                {{ number_format($item->produk->harga) }}
                <input type="hidden" name="harga[]" value="{{ $item->produk->harga }}">
              </td>
              <td class="border border-black px-4 py-2">
                {{ $item->kuantitas }}
                <input type="hidden" name="jumlah[]" value="{{ $item->kuantitas }}">
              </td>
              <td class="border border-black px-4 py-2">
                {{ number_format($subtotal) }}
                <input type="hidden" name="subtotal[]" value="{{ $subtotal }}">
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>

    <!-- Metode Pembayaran -->
    <section class="mb-6">
      <h2 class="text-xl font-bold mb-2">Metode Pembayaran</h2>
      <select name="metode_pembayaran" class="w-full border px-4 py-2 rounded" required>
        <option value="Transfer">Transfer Bank</option>
      </select>
    </section>

    <!-- Total -->
    <section class="mb-6">
      <label class="block font-bold mb-1">Total Pembayaran</label>
      <input type="text" name="total" value="{{ $total }}" class="w-full border px-4 py-2 rounded bg-gray-100" readonly>
    </section>

    <div class="text-right">
      <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-md hover:bg-pink-600">
        Buat Pesanan
      </button>
    </div>
  </form>
</main>

</body>
</html>

