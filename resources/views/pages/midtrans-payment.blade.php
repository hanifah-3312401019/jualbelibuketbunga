<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Midtrans</title>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-50 to-white min-h-screen flex items-center justify-center font-sans text-gray-800">

  <div class="bg-white max-w-md w-full mx-auto p-8 rounded-2xl shadow-xl border border-green-100">
    <div class="flex items-center justify-center mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-2.5 0-4.5 2-4.5 4.5S9.5 17 12 17s4.5-2 4.5-4.5S14.5 8 12 8z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.95l-.71.71M21 12h-1M3 12H2m16.95 7.95l-.71-.71M4.05 4.05l-.71-.71" />
      </svg>
    </div>

    <h2 class="text-2xl font-bold text-center text-green-600 mb-2">Pembayaran Pesanan</h2>
    <p class="text-center text-gray-600 mb-6">
      Total yang harus dibayar:
      <span class="text-lg font-semibold text-gray-800 block mt-1">Rp{{ number_format($pesanan->total) }}</span>
    </p>

    <button id="pay-button" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg text-lg font-semibold transition duration-200">
      Bayar Sekarang
    </button>
  </div>

  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
      snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){ window.location.href = "/resi"; },
        onPending: function(result){ window.location.href = "/resi"; },
        onError: function(result){ alert("Pembayaran gagal."); }
      });
    };
  </script>
</body>
</html>
