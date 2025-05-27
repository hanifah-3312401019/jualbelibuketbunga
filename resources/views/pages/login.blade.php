<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F5F5F5]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Bloomify</title>
    <!-- Tailwind CSS CDN + Font Awesome (jika perlu) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-start justify-center bg-gradient-to-b from-[#E8E3EF] to-white px-6 py-20">
    <div class="w-full max-w-4xl flex flex-col md:flex-row bg-white/80 rounded-3xl shadow-lg overflow-hidden">
        <!-- Kolom Gambar -->
        <div class="md:w-1/2 flex flex-col items-center justify-center bg-[#F8F6FA] p-10">
            <img src="{{ asset('images/buketmawarputih.png') }}" alt="Buket" class="w-60 mb-8">
            <a href="{{ url('/signup') }}" class="border border-gray-400 rounded-full px-6 py-1 text-gray-700 hover:bg-gray-100 transition mb-2">Registrasi</a>
            <p class="text-sm text-gray-500">Tidak memiliki akun? <a href="{{ url('/signup') }}" class="underline hover:text-pink-500">Registrasi</a></p>
        </div>

        <!-- Kolom Form -->
        <div class="md:w-1/2 flex flex-col justify-center p-10 bg-white">
            <h2 class="text-3xl font-bold text-center mb-2">MASUK</h2>
            <p class="text-center text-gray-700 mb-6">Selamat datang kembali! Silakan masuk ke akun anda</p>
            @if (session('error'))
                <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Email :</label>
                    <input type="email" name="email" placeholder="bloomify@gmail.com" required
                        class="w-full rounded-full border border-gray-400 px-5 py-2 bg-transparent focus:outline-none focus:ring-2 focus:ring-pink-200 text-gray-700 placeholder:text-gray-400" />
                </div>
                <div>
                    <label class="block mb-1 font-semibold text-gray-700">Kata sandi :</label>
                    <input type="password" name="password" placeholder="*****" required
                        class="w-full rounded-full border border-gray-400 px-5 py-2 bg-transparent focus:outline-none focus:ring-2 focus:ring-pink-200 text-gray-700" />
                </div>
                <div class="flex justify-center mt-4">
                    <button type="submit" class="border border-gray-700 rounded-full px-8 py-2 font-semibold hover:bg-gray-100 transition">MASUK</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
