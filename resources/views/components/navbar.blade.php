<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bloomify Buyer')</title>

    <!-- Tailwind + Flowbite + Font Awesome CDN -->
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-serif">

    <!-- Background Section -->
    @if (Request::is('tentang_kami'))
        <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/bgg.jpg') }}')]">
    @elseif (Request::is('hubungi_kami'))
        <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/tentanglatar.jpg') }}')]">
    @elseif (Request::is('keranjang'))
        <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/tentanglatar.jpg') }}')]">
    @elseif (Request::is('checkout'))
        <section class="relative h-[10vh] bg-cover bg-center text-white bg-[url('{{ asset('images/') }}')]">
    @elseif (Request::is('editprofil'))
        <section class="relative h-[20vh] bg-cover bg-center text-white bg-[url('{{ asset('images/latar.png') }}')]">
    @elseif (Request::is('detail-produk'))
        <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/tentanglatar.jpg') }}')]">
    @elseif (Request::is('search'))
        <section class="relative h-[40vh] bg-cover bg-center text-white bg-[url('{{ asset('images/tentanglatar.jpg') }}')]">
    @else
        <section class="relative h-[40vh] bg-cover bg-center text-white flex items-center bg-[url('{{ asset('images/latar.png') }}')]">
    @endif

    <!-- Navbar -->
    <nav class="absolute top-6 left-1/2 transform -translate-x-1/2 px-8 py-4 bg-white bg-opacity-70 shadow rounded-full flex justify-between items-center w-[90%] max-w-6xl h-16 z-10">
        <div class="flex items-center">
            <img src="{{ asset('images/Bloomify.png') }}" alt="Bloomify" class="h-20 w-auto" />
        </div>

        <ul class="flex space-x-8 text-gray-900 font-medium">
            <li><a href="{{ url('halaman_utama') }}" class="hover:text-pink-600">Halaman Utama</a></li>
            <li><a href="{{ url('produk') }}" class="hover:text-pink-600">Produk</a></li>
            <li><a href="{{ url('hubungi_kami') }}" class="hover:text-pink-600">Hubungi Kami</a></li>
            <li><a href="{{ url('tentang_kami') }}" class="hover:text-pink-600">Tentang Kami</a></li>
        </ul>

        <div class="flex items-center space-x-4">
            <!-- Updated Search Form -->
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Cari produk..." 
                    class="pl-4 pr-10 py-2 border rounded-full bg-gray-100 text-black focus:outline-none focus:ring-2 focus:ring-pink-300"
                    value="{{ request('q') }}"
                    id="search-input"
                    autocomplete="off" />
                <button type="submit" class="absolute right-3 top-3 text-gray-700 hover:text-pink-600">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <!-- Autocomplete dropdown -->
                <div id="autocomplete-dropdown" class="absolute top-full left-0 right-0 bg-white border rounded-lg shadow-lg mt-1 z-50 hidden max-h-60 overflow-y-auto">
                    <!-- Autocomplete results will be populated here -->
                </div>
            </form>
            
            <a href="/keranjang" title="Keranjang">
                <i class="fa-solid fa-cart-shopping text-xl text-black cursor-pointer"></i>
            </a>
            <a href="/editprofil" title="Akun">
                <i class="fa-solid fa-user text-xl text-black cursor-pointer"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="button" onclick="confirmLogout()" title="Logout" class="bg-transparent border-0 p-0 m-0">
                    <i class="fa-solid fa-right-from-bracket text-xl text-black cursor-pointer"></i>
                </button>
            </form>
        </div>
    </nav>

    <!-- Special Content di Atas Background -->
    @if (Request::is('halaman_utama'))
        <div class="text-left px-6 max-w-2xl ml-16 mt-20">
            <h1 class="text-5xl font-bold mb-4 text-white">B L O O M I F Y</h1>
            <p class="text-xl leading-relaxed text-white">
                Ingin mengirimkan ucapan selamat, atau cinta dan dukunganmu? <br>
                Apa pun pesan yang ingin kamu sampaikan, kami memiliki buket <br>
                yang tepat untukmu.
            </p>
        </div>
    @elseif (Request::is('tentang_kami'))
        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-2">⋆｡ﾟ☁︎｡ Tentang Kami ﾟ☾ ﾟ｡⋆</h1>
        </div>
    @elseif (Request::is('hubungi_kami'))
        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-1">Hubungi Kami</h1>
        </div>
    @elseif (Request::is('keranjang'))
        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-2">Keranjang Anda 🛒</h1>
        </div>
    @elseif (Request::is('detail-produk'))
        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-1">Detail Produk 🔍︎</h1>
        </div>
    @elseif (Request::is('search'))
        <div class="absolute inset-0 flex flex-col items-center justify-center z-0 text-center">
            <h1 class="text-5xl font-bold text-white mb-1">Hasil Pencarian 🔍</h1>
        </div>
    @endif

    </section>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init({ duration: 800, once: true });
        });
    </script>

    <script>
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    <!-- Search Autocomplete Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const dropdown = document.getElementById('autocomplete-dropdown');
            let timeout;

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                
                clearTimeout(timeout);
                
                if (query.length < 2) {
                    dropdown.classList.add('hidden');
                    return;
                }

                timeout = setTimeout(() => {
                    fetch(`{{ route('search.autocomplete') }}?q=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            dropdown.innerHTML = '';
                            
                            if (data.length > 0) {
                                data.forEach(suggestion => {
                                    const item = document.createElement('div');
                                    item.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700';
                                    item.textContent = suggestion;
                                    item.addEventListener('click', () => {
                                        searchInput.value = suggestion;
                                        dropdown.classList.add('hidden');
                                        searchInput.form.submit();
                                    });
                                    dropdown.appendChild(item);
                                });
                                dropdown.classList.remove('hidden');
                            } else {
                                dropdown.classList.add('hidden');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching autocomplete:', error);
                            dropdown.classList.add('hidden');
                        });
                }, 300);
            });

            // Hide dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });

            // Handle form submission
            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>

</body>
</html>