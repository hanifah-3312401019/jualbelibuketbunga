<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resi</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">

  <div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-8 relative">

      <!-- Logo dan Panah -->
      <div class="flex justify-between items-center mb-8">
        <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-12">
        <a href="javascript:history.back()" class="text-black">
          <i class="fas fa-arrow-right text-xl"></i>
        </a>
      </div>

      <!-- Data Pembeli -->
      <div class="mb-6">
        <h2 class="font-bold">Resi Pesanan</h2>
        <p class="font-bold">Nama Pembeli :</p>
        <p class="font-bold">Alamat Pembeli :</p>
        <p class="font-bold">No. Handphone Pembeli:</p>
      </div>

      <hr class="my-4">

      <!-- Info Pesanan -->
      <div class="mb-6">
        <div class="grid grid-cols-3 text-center font-bold">
          <p>No. Pesanan</p>
          <p>Tanggal Transaksi</p>
          <p>Metode Pembayaran Jasa Kirim</p>
        </div>
        <div class="grid grid-cols-3 text-center text-gray-300 mt-2">
          <p>230S27R6FKTBV2</p>
          <p>-</p>
          <p>-</p>
        </div>
      </div>

      <hr class="my-4">

      <!-- Rincian Pesanan -->
      <div class="mb-6">
        <h3 class="font-bold mb-2">Rincian Pesanan</h3>
        <table class="w-full text-left border-collapse">
          <thead class="border-b">
            <tr>
              <th class="py-2">No.</th>
              <th class="py-2">Produk</th>
              <th class="py-2">Harga Produk</th>
              <th class="py-2">Jumlah</th>
              <th class="py-2">Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <!-- Kosong dulu, data dinamis bisa ditambahkan -->
          </tbody>
        </table>
      </div>

      <hr class="my-4">

      <!-- Subtotal -->
      <div class="text-right mb-6">
        <p class="font-bold">Subtotal <span class="ml-4">Rp</span></p>
      </div>

      <!-- Total Pembayaran -->
      <div class="flex justify-end">
        <div class="bg-gray-100 rounded-md p-4 w-64">
          <p class="flex justify-between mb-2">Subtotal Pesanan <span>Rp</span></p>
          <p class="flex justify-between mb-2">Subtotal Pengiriman <span>Rp</span></p>
          <hr class="my-2">
          <p class="flex justify-between font-bold">Total Pembayaran <span>Rp</span></p>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
