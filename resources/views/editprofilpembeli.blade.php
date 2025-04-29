<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Edit Profil Pengguna
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abhaya+Libre&display=swap');

        body {
            font-family: 'Abhaya Libre', serif;
        }
    </style>
</head>

<body class="bg-[#f9fafb] min-h-screen flex flex-col">
    <!-- Bilah atas -->
    <header class="flex items-center justify-between bg-white px-6 py-3 border-b border-gray-200">
        <div class="flex items-center space-x-2">
            <img alt="Logo Bloomify bouquet flowers dengan teks hitam" class="w-20 h-30 object-contain" height="80" src="{{ asset('images/Bloomify.png') }}" width="80" />
        </div>
        <div class="flex items-center space-x-4 flex-grow max-w-xl mx-6">
            <div class="relative flex-grow">
                <input class="w-full rounded-full bg-[#f3f4f6] text-sm placeholder-gray-400 py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-black" placeholder="Cari" type="search" />
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
                </i>
            </div>
        </div>
        <nav class="flex items-center space-x-6 text-xs font-semibold select-none">
            <a class="hover:underline" href="halaman_utama">
                MENU UTAMA
            </a>
            <a class="hover:underline" href="#">
                PRODUK
            </a>
            <a class="hover:underline" href="#">
                HUBUNGI KAMI
            </a>
            <a class="hover:underline" href="#">
                TENTANG KAMI
            </a>
        </nav>
        <div class="flex items-center space-x-4 ml-6 text-gray-900 text-lg">
            <button aria-label="Keranjang" class="hover:text-gray-700">
                <i class="fas fa-shopping-cart">
                </i>
            </button>
            <button aria-label="Pengguna" class="hover:text-gray-700">
                <i class="fas fa-user">
                </i>
            </button>
            <button aria-label="Keluar" class="hover:text-gray-700">
                <i class="fas fa-sign-out-alt">
                </i>
            </button>
        </div>
    </header>
    <main class="flex flex-grow bg-white max-w-7xl mx-auto w-full mt-6 rounded-sm shadow-sm">
        <!-- Sidebar -->
        <aside class="flex flex-col items-center bg-[#f3f4f6] w-40 py-8 space-y-6 select-none">
            <img alt="Ikon profil pengguna lingkaran abu-abu dengan siluet orang" class="rounded-full" height="80" src="{{ asset('images/Bloomify.png') }}" width="80" />
            <span class="text-xs text-gray-700">
                PROFIL
            </span>
            <nav class="flex flex-col space-y-2 w-full px-4">
                <button class="text-xs bg-[#f9e6d9] rounded-md py-2 w-full text-center font-semibold text-gray-800" type="button">
                    Akun Saya
                </button>
            </nav>
        </aside>
        <!-- Konten -->
        <section class="flex-grow p-8">
            <h2 class="font-serif font-bold text-lg border-b border-black pb-1 mb-6 select-none">
                PROFIL PENGGUNA
            </h2>
            <div class="flex items-center space-x-4 mb-6">
                <img alt="Ikon profil pengguna lingkaran abu-abu dengan siluet orang" class="rounded-full" height="60" src="{{ asset('images/Bloomify.png') }}" width="60" />
                <input class="flex-grow rounded-md bg-[#e6e6f0] text-xs py-2 px-3 placeholder:text-xs placeholder:text-gray-500" placeholder="Pilih Foto" type="file" />
            </div>
            <form class="space-y-4 max-w-xl">
                <div>
                    <label class="block text-xs mb-1 select-none" for="nama">
                        Nama:
                    </label>
                    <input class="w-full rounded-md bg-[#e6e6f0] text-xs py-2 px-3" id="nama" type="text" />
                </div>
                <div>
                    <label class="block text-xs mb-1 select-none" for="username">
                        Nama Pengguna:
                    </label>
                    <input class="w-full rounded-md bg-[#e6e6f0] text-xs py-2 px-3" id="username" type="text" />
                </div>
                <div>
                    <label class="block text-xs mb-1 select-none" for="phone">
                        Nomor Telepon:
                    </label>
                    <input class="w-full rounded-md bg-[#e6e6f0] text-xs py-2 px-3" id="phone" type="tel" />
                </div>
                <div>
                    <label class="block text-xs mb-1 select-none" for="password">
                        Kata Sandi:
                    </label>
                    <input class="w-full rounded-md bg-[#e6e6f0] text-xs py-2 px-3" id="password" type="password" />
                </div>
                <div>
                    <label class="block text-xs mb-1 select-none" for="alamat">
                        Alamat:
                    </label>
                    <textarea class="w-full rounded-md bg-[#e6e6f0] text-xs py-2 px-3 resize-none" id="alamat" rows="3"></textarea>
                </div>
                <button class="bg-green-400 text-xs text-black rounded px-3 py-1 mt-2 select-none" type="submit">
                    Simpan
                </button>
            </form>
        </section>
    </main>
</body>

</html>