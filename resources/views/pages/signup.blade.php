<!DOCTYPE html>
<html lang="id" class="h-full bg-[#F5F5F5]">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi | Bloomify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#F5F5F5] px-4">

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-lg flex flex-col md:flex-row overflow-hidden">
        <!-- Form Registrasi -->
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <h1 class="text-3xl font-bold mb-1 text-center">REGISTRASI</h1>
            <p class="text-center text-gray-600 mb-8 text-sm">Mendaftar untuk sebuah akun</p>

            @if (session('error'))
                <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="text-red-500 text-sm mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/signup') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama :</label>
                    <input id="name" name="name" type="text" placeholder="Hwang Renjun" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-300 placeholder:text-gray-300" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email :</label>
                    <input id="email" name="email" type="email" placeholder="bloomify@gmail.com" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-300 placeholder:text-gray-300" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi :</label>
                    <input id="password" name="password" type="password" placeholder="******" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-300" />
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Ulangi Kata Sandi :</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="******" required
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-300" />
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="rounded-lg border border-gray-700 px-8 py-2 text-sm font-medium hover:bg-gray-100 transition">
                        Registrasi
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Gambar dan Tombol Masuk -->
        <div class="md:w-1/2 bg-[#f3f0f7] flex flex-col items-center justify-center p-10 rounded-tr-3xl rounded-br-3xl">
            <img src="{{ asset('images/buketmawarputih.png') }}" alt="BuketMawarPutih" class="w-75 mb-8" />
            <a href="{{ url('/login') }}"
                class="border border-gray-700 rounded-lg px-6 py-2 mb-2 hover:bg-gray-100 transition font-semibold">
                MASUK
            </a>
            <p class="text-sm text-gray-600">Sudah memiliki akun? <a href="{{ url('/login') }}" class="underline hover:text-pink-500">Masuk</a></p>
        </div>
    </div>

</body>

</html>
