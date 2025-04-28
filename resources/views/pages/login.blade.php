<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F5F5F5]"> <!-- Tambahkan h-full di sini -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bloomify</title>
    <link href="{{ asset('styles/flowbite.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('styles/flowbite.min.js') }}"></script>
</head>

<body class="min-h-screen flex items-center justify-center px-4"> <!-- Ganti h-full dan py-10 -->
    <div class="bg-white shadow-lg rounded-xl flex p-8 space-x-8">
        <!-- Gambar -->
        <div class="w-1/2 bg-[#f9f9f9] flex flex-col items-center justify-center p-6 space-y-4">
            <img src="{{ asset('images/Bloomify.png') }}" alt="Login" class="w-60 rounded-lg shadow">
            <!-- Teks Daftar -->
            <p class="text-sm text-center text-gray-500">
                Tidak memiliki akun?
                <a href="{{ url('/signup') }}"
                    class="text-purple-600 font-semibold hover:underline">
                    Daftar
                </a>
            </p>
        </div>

        <!-- Form -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold text-center text-gray-700">MASUK</h2>
            <p class="text-sm text-center text-gray-600 mb-6">Selamat datang kembali, silahkan masuk menggunakan akun anda</p>
            @if (session('error'))
            <div class="text-red-500 text-sm text-center mb-4">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium text-gray-700">Email: </label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Kata Sandi: </label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>

                <!-- Tombol MASUK -->
                 <div class="flex justify-center items-center">
                 <button type="button" class="text-black bg-gradient-to-br from-purple-600 to-white-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-white-300 dark:focus:ring-white-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Masuk</button>
            </div>
            </form>
        </div>
    </div>
</body>

</html>