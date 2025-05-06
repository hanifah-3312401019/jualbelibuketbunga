@include('components.navbar')

<main class="flex bg-gray-50 max-w-9xl mx-auto rounded-xxl shadow-md overflow-hidden h-full gap-s-1">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white shadow-md rounded-xl m-4 md:m-10 flex-shrink-0">
        <nav class="flex md:flex-col flex-row md:space-y-2 space-x-4 md:space-x-0 p-6">
            <a href="{{ url('/editprofil') }}" class="flex items-center px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-pink-100 transition
                @if(request()->is('editprofil')) bg-pink-100 text-black-500 @endif">
                <i class="fa-solid fa-user mr-3"></i> Profil Saya
            </a>
            <a href="{{ url('/riwayat-pesanan') }}" class="flex items-center px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-pink-100 transition
                @if(request()->is('riwayat-pesanan')) bg-pink-100 text-black-500 @endif">
                <i class="fa-solid fa-clock-rotate-left mr-3"></i> Riwayat Pesanan
            </a>
        </nav>
    </aside>

    <!-- Content -->
    <section class="flex-1 flex justify-center items-center px-4 py-12">
        <div class="bg-white w-full max-w-4xl p-8 rounded-xl shadow-md">
            <h1 class="text-2xl font-bold text-center text-black mb-8">Edit Profil Akun Saya</h1>
            <div class="flex flex-col md:flex-row gap-10">
                <!-- Foto Profil -->
                <div class="flex flex-col items-center md:w-1/3">
                    <div class="relative">
                        <img 
                            src="{{ asset('images/user.png') }}" 
                            alt="Foto Pengguna" 
                            class="w-40 h-40 rounded-full object-cover border-2 border-gray-300 shadow">
                        <label 
                            for="fotoProfil" 
                            class="absolute top-1 right-1 bg-white p-2 rounded-full shadow cursor-pointer hover:bg-gray-100 transition">
                            <i class="fa fa-camera text-gray-600"></i>
                            <input id="fotoProfil" type="file" class="hidden"/>
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-gray-500 text-center max-w-[160px]">
                        Klik ikon kamera untuk mengganti foto profil
                    </p>
                </div>

                <!-- Form Profil -->
                <form 
                    class="flex-1 grid grid-cols-1 gap-6 md:grid-cols-2" 
                    method="POST" 
                    action="{{ url('/update-profil') }}">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm mb-1 text-black">Nama Lengkap</label>
                        <input 
                            id="nama" 
                            name="nama" 
                            type="text" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan nama Anda"/>
                    </div>
                    <div>
                        <label for="username" class="block text-sm mb-1 text-black">Nama Pengguna</label>
                        <input 
                            id="username" 
                            name="username" 
                            type="text" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan username (jika ada)"/>
                    </div>
                    <div>
                        <label for="email" class="block text-sm mb-1 text-black">Email</label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan email aktif"/>
                    </div>
                    <div>
                        <label for="telepon" class="block text-sm mb-1 text-black">Nomor Telepon</label>
                        <input 
                            id="telepon" 
                            name="telepon" 
                            type="tel" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Contoh: 081234567890"/>
                    </div>
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm mb-1 text-black">Alamat Lengkap</label>
                        <textarea 
                            id="alamat" 
                            name="alamat" 
                            rows="3" 
                            class="w-full bg-[#fff1f3] text-sm rounded-xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-rose-300 resize-none" 
                            placeholder="Masukkan alamat Anda"></textarea>
                    </div>
                    <div class="md:col-span-2 flex justify-center">
                        <button 
                            type="submit" 
                            class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition font-semibold">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@include('components.footer_')


