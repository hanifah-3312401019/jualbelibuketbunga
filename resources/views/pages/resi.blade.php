<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resi Pesanan - Bloomify</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-8 relative">

      <!-- Header -->
      <div class="flex justify-between items-center mb-8">
        <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-12">
        <a href="{{ route('pages.keranjang.index') }}" class="text-black hover:text-gray-700">
          <i class="fas fa-arrow-left text-xl"></i>
        </a>
      </div>

      <!-- Status Badge -->
      <div class="absolute top-4 right-4">
        @php
          $statusClass = match($pesanan->status) {
            'success' => 'bg-green-100 text-green-700',
            'failed' => 'bg-red-100 text-red-700',
            default => 'bg-yellow-100 text-yellow-700',
          };
        @endphp
        <span class="text-sm px-3 py-1 rounded-full {{ $statusClass }}">
          Status: {{ ucfirst($pesanan->status) }}
        </span>
      </div>

      <!-- Info Pembeli -->
      <div class="mb-6">
        <h2 class="text-xl font-bold mb-2">Informasi Penerima</h2>
        <p><span class="font-semibold">Nama:</span> {{ $pesanan->nama_penerima }}</p>
        <p><span class="font-semibold">Alamat:</span> {{ $pesanan->alamat }}</p>
        <p><span class="font-semibold">No. HP:</span> {{ $pesanan->telepon }}</p>
      </div>

      <hr class="my-4">

      <!-- Info Umum -->
      <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-700">
        <div>
          <p class="font-semibold">No. Invoice</p>
          <p class="text-gray-600">ORDER-{{ $pesanan->id }}</p>
        </div>
        <div>
          <p class="font-semibold">Tanggal Transaksi</p>
          <p class="text-gray-600">{{ $pesanan->created_at->format('d M Y, H:i') }}</p>
        </div>
        <div>
          <p class="font-semibold">Metode Pembayaran</p>
          <p class="text-gray-600">{{ ucfirst($pesanan->metode_pembayaran) }}</p>
        </div>
      </div>

      <hr class="my-4">

      <!-- Rincian Pesanan -->
      <div class="mb-6">
        <h3 class="text-lg font-bold mb-3">Rincian Pesanan</h3>
        <div class="overflow-x-auto">
          <table class="w-full text-sm border-collapse">
            <thead class="text-gray-700 bg-gray-100">
              <tr>
                <th class="py-2 px-3 text-left">No.</th>
                <th class="py-2 px-3 text-left">Produk</th>
                <th class="py-2 px-3 text-right">Harga</th>
                <th class="py-2 px-3 text-center">Jumlah</th>
                <th class="py-2 px-3 text-right">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pesanan->detail as $i => $item)
              <tr class="border-b">
                <td class="py-2 px-3">{{ $i + 1 }}</td>
                <td class="py-2 px-3">{{ $item->produk }}</td>
                <td class="py-2 px-3 text-right">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td class="py-2 px-3 text-center">{{ $item->jumlah }}</td>
                <td class="py-2 px-3 text-right">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <hr class="my-4">

      <!-- Total -->
      <div class="flex justify-end">
        <div class="bg-gray-50 rounded-md shadow-sm p-5 w-full md:w-1/3">
          <div class="flex justify-between mb-2">
            <span>Subtotal Pesanan</span>
            <span>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between mb-2">
            <span>Ongkos Kirim</span>
            <span>Rp0</span>
          </div>
          <hr class="my-2">
          <div class="flex justify-between text-lg font-bold">
            <span>Total Bayar</span>
            <span>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</span>
          </div>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
