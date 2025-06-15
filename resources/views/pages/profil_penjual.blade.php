@extends('layouts.penjual')

@section('title', 'Edit Profil')

@section('content')
<section class="flex-1 flex justify-center items-center px-4 py-12">
  <div class="bg-white w-full max-w-4xl p-8 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold text-center text-black mb-8">Edit Profil Penjual</h1>

    @if(session('success'))
    <div class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-md mb-4" role="alert">
      <strong class="font-bold">Berhasil!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <form method="POST" action="{{ route('penjual.updateProfil') }}" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-10">
      @csrf
      @method('PUT')

      <!-- Foto Profil -->
      <div class="flex flex-col items-center md:w-1/3">
        <div class="relative">
          <img 
            src="{{ $penjual->foto ? asset('images/' . $penjual->foto) : asset('images/default.jpg') }}" 
            alt="Foto Pengguna" 
            class="w-40 h-40 rounded-full object-cover border-2 border-gray-300 shadow">
          <label 
            for="fotoProfil" 
            class="absolute top-1 right-1 bg-white p-2 rounded-full shadow cursor-pointer hover:bg-gray-100 transition">
            <i class="fa fa-camera text-gray-600"></i>
            <input id="fotoProfil" name="foto" type="file" accept="image/*" class="hidden"/>
          </label>
        </div>
        <p class="mt-2 text-xs text-gray-500 text-center max-w-[160px]">Klik ikon kamera untuk mengganti foto profil</p>
      </div>

      <!-- Form Profil -->
      <div class="flex-1 grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
          <label class="block text-sm mb-1 text-black">Nama Lengkap</label>
          <input name="nama" type="text" value="{{ old('nama', $penjual->nama) }}"
                 class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300">
        </div>
        <div>
          <label class="block text-sm mb-1 text-black">Username</label>
          <input name="nama_pengguna" type="text" value="{{ old('nama_pengguna', $penjual->nama_pengguna) }}"
                 class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300">
        </div>
        <div>
          <label class="block text-sm mb-1 text-black">Email</label>
          <input name="email" type="email" value="{{ old('email', $penjual->email) }}"
                 class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300">
        </div>
        <div>
          <label class="block text-sm mb-1 text-black">Nomor Telepon</label>
          <input name="no_telepon" type="tel" value="{{ old('no_telepon', $penjual->no_telepon) }}"
                 class="w-full bg-[#fff1f3] text-sm rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-rose-300">
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm mb-1 text-black">Alamat Lengkap</label>
          <textarea name="alamat" rows="3"
                    class="w-full bg-[#fff1f3] text-sm rounded-xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-rose-300 resize-none">{{ old('alamat', $penjual->alamat) }}</textarea>
        </div>
        <div class="md:col-span-2 flex justify-center">
          <button type="submit"
                  onclick="return confirm('Apakah Anda yakin ingin mengubah profil?')"
                  class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition font-semibold">
            Simpan Perubahan
          </button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const inputFoto = document.getElementById('fotoProfil');
    const imgPreview = document.querySelector('img[alt="Foto Pengguna"]');

    inputFoto.addEventListener('change', function () {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imgPreview.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      }
    });
  });
</script>
@endpush
