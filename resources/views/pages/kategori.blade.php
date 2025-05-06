<!-- File contoh, tidak di pakai dalam PBL -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Seller</title>
    <link href="{{ asset('styles/flowbite.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('styles/flowbite.min.js') }}"></script>
</head>

<body class="bg-gradient-to-b from-pink-50 to-purple-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-60 bg-white p-4 flex flex-col justify-between shadow-lg">
        <div>
            <div class="text-center mb-8">
                <img src="{{ asset('images/Bloomify.png') }}" alt="Logo" class="h-100">

            </div>
            <nav class="space-y-3">
                <a href="#" class="flex items-center px-4 py-2 rounded-full bg-pink-100 text-black font-medium">
                    <i class="ph ph-house mr-2"></i> DASHBOARD
                </a>
                <a href="#" class="flex items-center px-4 py-2 rounded-full hover:bg-pink-100 transition">
                    <i class="ph ph-package mr-2"></i> DAFTAR PRODUK
                </a>
                <a href="#" class="flex items-center px-4 py-2 rounded-full hover:bg-pink-100 transition">
                    <i class="ph ph-clipboard-text mr-2"></i> REKAPITULASI PENJUALAN
                </a>
                <a href="kategori" class="flex items-center px-4 py-2 rounded-full hover:bg-pink-100 transition">
                    <i class="ph ph-tag mr-2"></i> KATEGORI PRODUK
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <!-- Navbar -->
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-xl font-bold">DASHBOARD</h2>
            <div class="flex items-center space-x-4">
                <i class="ph ph-user-circle text-2xl"></i>
                <a href="/logout" class="ph ph-sign-out text-2xl hover:text-red-500 transition"></a>
            </div>
        </div>

        <!-- Tombol tanpa Font Awesome -->
        <button class="flex items-center gap-2 bg-gray-200 hover:bg-yellow-400 text-black font-semibold py-2 px-4 rounded-full shadow">
            <span class="text-xl font-bold">+</span>
            TAMBAH KATEGORI
        </button>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Kategori
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</body>

</html>