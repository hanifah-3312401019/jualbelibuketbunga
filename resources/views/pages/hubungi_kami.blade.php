@include('components.navbar')

<div class="bg-white rounded-lg shadow-md max-w-7xl mx-auto mt-10 mb-10 p-8">

  {{-- ✅ Pesan Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    {{-- Tiga Kolom Info --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="flex flex-col items-center text-center border-r md:border-r-0 md:border-b-0 border-b pb-6 md:pb-0 md:pr-6">
            <div class="bg-pink-100 text-pink-500 rounded-full p-3 mb-3">
                <i class="fas fa-map-marker-alt fa-lg"></i>
            </div>
            <h4 class="font-semibold mb-1">Alamat</h4>
            <p class="text-gray-600 text-sm">123 Bloom Street, Flower City, 56789</p>
        </div>
        <div class="flex flex-col items-center text-center border-r md:border-r-0 md:border-b-0 border-b pb-6 md:pb-0 md:px-6">
            <div class="bg-pink-100 text-pink-500 rounded-full p-3 mb-3">
                <i class="fas fa-envelope fa-lg"></i>
            </div>
            <h4 class="font-semibold mb-1">Email</h4>
            <p class="text-gray-600 text-sm">pblbloomify@gmail.com</p>
        </div>
        <div class="flex flex-col items-center text-center md:pl-6">
            <div class="bg-pink-100 text-pink-500 rounded-full p-3 mb-3">
                <i class="fas fa-phone fa-lg"></i>
            </div>
            <h4 class="font-semibold mb-1">Telepon</h4>
            <p class="text-gray-600 text-sm">(+62) 123-456-7890</p>
        </div>
    </div>

    {{-- Form --}}
    <form class="space-y-6 max-w-7xl mx-auto" method="POST" action="{{ route('hubungi.kirim') }}">
    @csrf
    <h2 class="text-xl font-semibold mb-4">Kami senang mendengar Anda!</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="relative">
            <input
            type="text"
            name="nama"
            required
            value="{{ auth()->check() ? auth()->user()->nama : '' }}"
            placeholder="Masukkan nama Anda"
            class="w-full border rounded px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm"/>
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-400"><i class="fa-regular fa-user"></i></span>
        </div>
        <div class="relative">
            <input
            type="email"
            name="email"
            required
            value="{{ auth()->check() ? auth()->user()->email : '' }}"
            placeholder="Masukkan alamat email"
            class="w-full border rounded px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm"/>
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-400"><i class="fa-regular fa-envelope"></i></span>
        </div>
        <div class="relative">
            <select name="layanan" required class="w-full border rounded px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm appearance-none">
                <option value="">Pilih Jenis Layanan</option>
                <option value="Buket Bunga Segar">Buket Bunga Segar</option>
                <option value="Buket Bunga Random">Buket Bunga Random</option>
                <option value="Buket Bunga Pesanan">Buket Bunga Pesanan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-400 pointer-events-none"><i class="fa-solid fa-chevron-down"></i></span>
        </div>
        <div class="relative">
            <input
            type="text"
            name="telepon"
            required
            value="{{ auth()->check() ? auth()->user()->no_telepon : '' }}"
            placeholder="Masukkan nomor telepon"
            class="w-full border rounded px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm"/>
            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-pink-400"><i class="fa-solid fa-phone"></i></span>
        </div>
    </div>
    <div class="relative">
        <textarea name="pesan" required placeholder="Masukkan pesan" class="w-full border rounded px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm h-28 resize-none"></textarea>
        <span class="absolute right-3 top-3 text-pink-400"><i class="fa-regular fa-pen-to-square"></i></span>
    </div>
    <button type="submit" class="bg-pink-500 text-white px-8 py-3 rounded hover:bg-pink-600 transition font-semibold">
        Kirimkan pesan
    </button>
</form>

</div>

{{-- Google Map --}}
<div class="max-w-7xl mx-auto mb-10">
    <iframe
        src="https://www.google.com/maps?q=Batam,Kepulauan+Riau,Indonesia&hl=id&z=14&output=embed"
        width="100%"
        height="350"
        frameborder="0"
        style="border:0; border-radius:1rem;"
        allowfullscreen=""
        aria-hidden="false"
        tabindex="0"
        loading="lazy"
    ></iframe>
</div>

@include('components.footer_')
