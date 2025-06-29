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
    <section class="flex-1 px-4 py-12">
    <div class="bg-white w-full max-w-4xl p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-center text-black mb-8">Riwayat Pesanan</h1>

        @if ($pesanan->isEmpty())
            <p class="text-center text-gray-500">Belum ada riwayat pesanan.</p>
        @else
            <div class="space-y-4">
                @foreach ($pesanan as $item)
                    <div class="border p-4 rounded-lg shadow-sm">
                        <p><strong>ID Pesanan:</strong> {{ $item->id }}</p>
                        <p><strong>Nama Penerima:</strong> {{ $item->nama_penerima }}</p>
                        <p><strong>Total:</strong> Rp{{ number_format($item->total, 0, ',', '.') }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
                        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
</main>

@include('components.footer_')
