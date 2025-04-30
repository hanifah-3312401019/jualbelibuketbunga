<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Bloomify</title>
  <script src="https://cdn.tailwindcss.com"></script>

  @include('components.navbar')
  
  <script>
    function toggleModal(id) {
      const modal = document.getElementById(id);
      modal.classList.toggle('hidden');
    }

    function updateOngkir() {
      const selectedOngkir = document.querySelector('input[name="shipping"]:checked').value;
      let ongkir = selectedOngkir === 'hemat' ? 10000 : 15000;
      document.getElementById('subtotalPengiriman').innerText = `Rp${ongkir.toLocaleString('id-ID')}`;

      const produkTotal = 390000;
      document.getElementById('totalPembayaran').innerText = `Rp${(produkTotal + ongkir).toLocaleString('id-ID')}`;
    }

    function buatPesanan() {
      const metode = document.querySelector('input[name="payment"]:checked').value;
      if (metode === 'COD') {
        window.location.href = '/resi';
      } else if (metode === 'Bank Transfer') {
        const kodePembayaran = 'TRF' + Math.floor(Math.random() * 1000000);
        alert('Kode Pembayaran Anda: ' + kodePembayaran);
        window.location.href = '/resi';
      }
    }
  </script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Body Checkout -->
  <main class="container mx-auto px-8 py-10 bg-white rounded-xl shadow-md mt-10">

    <!-- Header Checkout -->
    <div class="mb-6 flex items-center justify-between">
      <div class="flex items-center">
        <a href="javascript:history.back()" class="text-black mr-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </a>
        <h2 class="text-2xl font-bold">Checkout</h2>
      </div>
      <div>
        <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify Logo" class="h-10">
      </div>
    </div>

    <!-- Alamat Pengiriman -->
    <section class="mb-6">
      <h2 class="text-xl font-bold">Alamat Pengiriman</h2>
      <p class="font-semibold" id="namaPenerima">Nishimura Riki <span class="text-sm font-normal">(+6281234567890)</span></p>
      <p class="text-sm" id="alamatPenerima">Perumahan Buana View Blok Tulip NO. 03</p>
      <button onclick="toggleModal('alamatModal')" class="text-blue-500 text-sm hover:underline mt-2 inline-block">Ubah</button>
      <hr class="mt-4">
    </section>

    <!-- Modal Ubah Alamat -->
    <div id="alamatModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Ubah Alamat Pengiriman</h2>
        <input type="text" id="namaBaru" placeholder="Nama Penerima" class="w-full border px-4 py-2 mb-2 rounded">
        <input type="text" id="telpBaru" placeholder="No. Telepon" class="w-full border px-4 py-2 mb-2 rounded">
        <textarea id="alamatBaru" placeholder="Alamat Lengkap" class="w-full border px-4 py-2 mb-4 rounded"></textarea>
        <div class="text-right">
          <button onclick="toggleModal('alamatModal')" class="bg-gray-300 px-4 py-2 rounded mr-2">Batal</button>
          <button onclick="
            document.getElementById('namaPenerima').innerHTML = document.getElementById('namaBaru').value + 
            ' <span class=\'text-sm font-normal\'>(' + document.getElementById('telpBaru').value + ')</span>';
            document.getElementById('alamatPenerima').innerText = document.getElementById('alamatBaru').value;
            toggleModal('alamatModal');
          " class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
      </div>
    </div>

    <!-- Produk Dipesan -->
    <section class="overflow-x-auto mb-6">
      <table class="w-full border border-black text-center">
        <thead class="bg-gray-100 font-bold">
          <tr>
            <th class="border border-black px-4 py-2">Produk Dipesan</th>
            <th class="border border-black px-4 py-2">Harga Satuan</th>
            <th class="border border-black px-4 py-2">Jumlah</th>
            <th class="border border-black px-4 py-2">Subtotal Produk</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-black px-4 py-2 flex items-center justify-center">
              <img src="{{ asset('images/bukettulip.png') }}" alt="Buket Tulip Biru" class="w-24 h-24 object-cover mr-4">
              <span>Buket Bunga Tulip Biru</span>
            </td>
            <td class="border border-black px-4 py-2">190.000</td>
            <td class="border border-black px-4 py-2">1</td>
            <td class="border border-black px-4 py-2">190.000</td>
          </tr>
          <tr>
            <td class="border border-black px-4 py-2 flex items-center justify-center">
              <img src="{{ asset('images/buketdaisy.png') }}" alt="Buket Daisy Putih" class="w-24 h-24 object-cover mr-4">
              <span>Buket Bunga Daisy Putih</span>
            </td>
            <td class="border border-black px-4 py-2">220.000</td>
            <td class="border border-black px-4 py-2">1</td>
            <td class="border border-black px-4 py-2">220.000</td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- Opsi Pengiriman -->
    <section class="mb-6">
      <h3 class="font-bold text-md mb-2">Opsi Pengiriman</h3>
      <div class="flex flex-col gap-2">
        <label class="inline-flex items-center">
          <input type="radio" name="shipping" value="hemat" class="form-radio" onclick="updateOngkir()">
          <span class="ml-2">Hemat (Rp10.000)</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" name="shipping" value="reguler" class="form-radio" onclick="updateOngkir()" checked>
          <span class="ml-2">Reguler (Rp15.000)</span>
        </label>
      </div>
      <hr class="mt-4">
    </section>

    <!-- Rincian Pembayaran -->
    <section class="mb-6">
      <h3 class="font-bold text-md mb-2">Rincian Pembayaran</h3>
      <p class="text-sm">Subtotal Produk <span class="float-right">Rp410.000</span></p>
      <p class="text-sm">Subtotal Pengiriman <span id="subtotalPengiriman" class="float-right">Rp15.000</span></p>
      <p class="font-bold">Total Pembayaran <span id="totalPembayaran" class="float-right">Rp425.000</span></p>
      <hr class="mt-4">
    </section>

    <!-- Metode Pembayaran -->
    <section class="mb-10">
      <h3 class="font-bold text-md mb-2">Metode Pembayaran</h3>
      <div class="flex flex-col gap-2">
        <label class="inline-flex items-center">
          <input type="radio" name="payment" value="COD" class="form-radio" checked>
          <span class="ml-2">COD (Bayar di Tempat)</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" name="payment" value="Bank Transfer" class="form-radio">
          <span class="ml-2">Transfer Bank (Mandiri, BCA, BRI)</span>
        </label>
      </div>
      <hr class="mt-4">
    </section>

    <!-- Tombol Buat Pesanan -->
    <div class="text-right">
      <button onclick="buatPesanan()" class="bg-pink-500 text-white px-6 py-2 rounded-md hover:bg-pink-600">
        Buat Pesanan
      </button>
    </div>

  </main>

</body>
</html>
