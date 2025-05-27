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
            @if(session('success'))
            <div class="w-full ml-auto bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-md mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
            <form class="flex flex-col md:flex-row gap-10" method="POST" action="{{ url('/editprofil') }}" enctype="multipart/form-data">
                @csrf
                <!-- Foto Profil -->
                <div class="flex flex-col items-center md:w-1/3">
                    <div class="relative">
                        <img 
                            src="{{ $user->foto ? asset('images/' . $user->foto) : asset('images/default.jpg') }}"
                            alt="Foto Pengguna" 
                            class="w-40 h-40 rounded-full object-cover border-2 border-gray-300 shadow">
                        <label 
                            for="fotoProfil" 
                            class="absolute top-1 right-1 bg-white p-2 rounded-full shadow cursor-pointer hover:bg-gray-100 transition">
                            <i class="fa fa-camera text-gray-600"></i>
                            <input 
                                id="fotoProfil" 
                                name="foto" 
                                type="file" 
                                accept="image/*"
                                class="hidden" />
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-gray-500 text-center max-w-[160px]">
                        Klik ikon kamera untuk mengganti foto profil
                    </p>
                </div>

                <!-- Form Profil -->
                <div class="flex-1 grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="nama" class="block text-sm mb-1 text-black">Nama Lengkap</label>
                        <input 
                            id="nama" 
                            name="nama" 
                            type="text"
                            value="{{ old('nama', $user->nama) }}" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan nama Anda"/>
                    </div>
                    <div>
                        <label for="username" class="block text-sm mb-1 text-black">Nama Pengguna</label>
                        <input 
                            id="nama_pengguna"
                            name="nama_pengguna" 
                            type="text"
                            value="{{ old('nama_pengguna', $user->nama_pengguna) }}" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan username (jika ada)"/>
                    </div>
                    <div>
                        <label for="email" class="block text-sm mb-1 text-black">Email</label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email"
                            value="{{ old('email', $user->email) }}" 
                            class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300" 
                            placeholder="Masukkan email aktif"/>
                    </div>
                    <div>
                        <label for="telepon" class="block text-sm mb-1 text-black">Nomor Telepon</label>
                        <input 
                            id="no_telepon" 
                            name="no_telepon" 
                            type="tel"
                            value="{{ old('no_telepon', $user->no_telepon) }}" 
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
                            placeholder="Masukkan alamat Anda">{{ old('alamat', $user->alamat) }}</textarea>
                    </div>
                    <div class="md:col-span-2 flex justify-center">
                        <button 
                            type="submit" 
                            onclick="return confirm('Apakah Anda yakin ingin mengubah informasi profil Anda?')"
                            class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition font-semibold">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

@include('components.footer_')

<script>
document.getElementById('fotoProfil').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Ganti src img dengan hasil foto yang dipilih
            document.querySelector('img[alt="Foto Pengguna"]').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
});
</script>
