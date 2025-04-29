<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Penjual - Bloomify</title>

    <!-- Tailwind CSS & Google Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Abhaya Libre', serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-[#E8E3EF] to-white">

    <div class="flex w-[80%] max-w-5xl shadow-lg rounded-3xl overflow-hidden">
        <!-- Gambar -->
        <div class="w-1/2 bg-[#E8E3EF] flex items-center justify-center p-10">
            <img src="{{ asset('images/bukettulip.png') }}" alt="Bouquet" class="max-h-[400px]">
        </div>

        <!-- Form -->
        <div class="w-1/2 bg-white py-16 px-10">
            <h2 class="text-3xl font-bold mb-2 text-center">MASUK</h2>
            <p class="text-center mb-10 text-sm">Selamat datang kembali! Silakan masuk ke akun anda</p>

            <form action="#" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block mb-1">Email :</label>
                    <input type="email" id="email" name="email"
                        class="w-full bg-[#E8E3EF] border border-gray-300 rounded-full px-4 py-2 text-sm"
                        placeholder="bloomify@gmail.com">
                </div>
                <div>
                    <label for="password" class="block mb-1">Kata sandi :</label>
                    <input type="password" id="password" name="password"
                        class="w-full bg-[#E8E3EF] border border-gray-300 rounded-full px-4 py-2 text-sm"
                        placeholder="******">
                </div>
                <div class="text-center pt-4">
                    <button type="submit"
                        class="px-6 py-2 border border-black rounded-md hover:bg-gray-100 transition font-semibold">
                        MASUK
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
