<head>
  <title>Gambar dan Style</title>
  <link rel="stylesheet" href="https://cdn.tailwindcss.com/3.4.1">
  <link rel="stylesheet" href="{{ asset('styles/style_hani.css') }}">
  <script src="{{ asset('styles/tailwindcss3.4.1.js') }}"></script>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-red-600 text-center text-3xl font-bold mb-8">
    .ೃ࿔*°❀⋆ Toko online buket bunga Bloomify °❀⋆.ೃ࿔*
</h1>

<div class="selamat-datang bg-white text-center p-6 mb-6 rounded-lg shadow-md max-w-xl mx-auto">
    <p class="text-xl text-gray-700 font-semibold">Selamat Datang di <span class="text-pink-600 font-bold">Bloomify</span>! 🌸</p>
    <p class="text-gray-500 mt-2">Temukan buket bunga cantik untuk momen spesialmu!</p>
</div>

<div class="flex justify-center gap-10">
    <img src="{{ asset('images/buket1.jpg') }}" alt="Buket1" class="w-60 rounded-lg shadow-lg">
    <img src="{{ asset('images/buket2.jpg') }}" alt="Buket2" class="w-60 rounded-lg shadow-lg">
</div>
</body>