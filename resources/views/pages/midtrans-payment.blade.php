<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran - Bloomify</title>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="{{ asset('images/Bloomify.png') }}" type="image/png">
</head>

<body class="bg-gradient-to-br from-pink-50 to-white min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white max-w-md w-full mx-auto p-8 rounded-3xl shadow-2xl border border-pink-100 relative">
    
    <!-- Logo -->
    <div class="absolute top-5 left-5">
      <img src="{{ asset('images/Bloomify.png') }}" alt="Logo Bloomify" class="h-10">
    </div>

    <!-- Icon -->
    <div class="flex items-center justify-center mb-6">
      <div class="bg-pink-100 p-4 rounded-full shadow">
        <i class="fa-solid fa-credit-card text-pink-500 text-3xl"></i>
      </div>
    </div>

    <h2 class="text-2xl font-bold text-center text-pink-600 mb-2">Pembayaran Pesanan</h2>
    <p class="text-center text-gray-600 mb-6">
      Total yang harus dibayar:
      <span class="text-lg font-semibold text-gray-900 block mt-1">Rp{{ number_format($pesanan->total, 0, ',', '.') }}</span>
    </p>

    <button id="pay-button" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-full text-lg font-semibold shadow-md transition-all duration-300">
      Bayar Sekarang
    </button>

    <div class="text-center text-sm text-gray-400 mt-6">
      Anda akan dialihkan ke halaman pembayaran Midtrans
    </div>
  </div>

  <script type="text/javascript">
  document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
      onSuccess: function(result) {
        console.log(result);
        showSuccessOptions();
      },
      onPending: function(result) {
        console.log(result);
        showSuccessOptions();
      },
      onError: function(result) {
        alert("Pembayaran gagal.");
      }
    });
  };

  function showSuccessOptions() {
    const container = document.querySelector(".text-center.text-sm");
    container.innerHTML = `
      <div class="mt-4">
        <p class="text-green-600 font-semibold">Pembayaran berhasil!</p>
        <a href="/resi" class="mt-2 inline-block bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-full shadow-md transition-all duration-300">
          Lanjut ke Resi
        </a>
      </div>
    `;
  }
</script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

</body>
</html>
