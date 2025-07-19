@include('components.navbar')

<main class="flex bg-gray-50 max-w-7xl mx-auto rounded-2xl shadow-md overflow-hidden min-h-screen gap-4">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white shadow-md rounded-xl m-4 md:m-10 flex-shrink-0">
        <nav class="flex md:flex-col flex-row md:space-y-2 space-x-4 md:space-x-0 p-6">
            <a href="{{ url('/editprofil') }}" 
               class="flex items-center px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-pink-100 transition
               @if(request()->is('editprofil')) bg-pink-100 text-black @endif">
                <i class="fa-solid fa-user mr-3"></i> Profil Saya
            </a>
            <a href="{{ url('/riwayat-pesanan') }}" 
               class="flex items-center px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-pink-100 transition
               @if(request()->is('riwayat-pesanan')) bg-pink-100 text-black @endif">
                <i class="fa-solid fa-clock-rotate-left mr-3"></i> Riwayat Pesanan
            </a>
        </nav>
    </aside>

    <!-- Content -->
    <section class="flex-1 px-4 py-12">
        <div class="bg-white w-full max-w-4xl mx-auto p-8 rounded-xl shadow-md">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Riwayat Pesanan</h1>

            <form method="GET" action="{{ route('riwayat.pesanan') }}" class="mb-6 flex justify-center gap-4">
                <select name="filter" onchange="this.form.submit()" 
                        class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-300">
                    <option value="">Semua Waktu</option>
                    <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                </select>
            </form>

            @if ($pesanan->isEmpty())
                <p class="text-center text-gray-500">Belum ada riwayat pesanan.</p>
            @else
                <div class="space-y-6">
                    @foreach ($pesanan as $item)
                        <div class="border p-6 rounded-xl shadow hover:shadow-lg transition-all bg-gradient-to-br from-white to-gray-50">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="font-semibold text-lg text-gray-800">ID Pesanan: {{ $item->id }}</h2>
                                <span class="text-sm px-3 py-1 rounded-full bg-pink-100 text-pink-600">{{ ucfirst($item->status) }}</span>
                            </div>

                            <ul class="list-disc list-inside text-gray-700 mb-4">
                                @foreach ($item->detail as $detail)
                                    <li>{{ is_object($detail->produk) ? $detail->produk->nama : $detail->produk }} (x{{ $detail->jumlah }})</li>
                                @endforeach
                            </ul>

                            <p><strong>Nama Penerima:</strong> {{ $item->nama_penerima }}</p>
                            <p><strong>Total:</strong> Rp{{ number_format($item->total, 0, ',', '.') }}</p>

                            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}</p>

                            @if ($item->resi_file)
                                <div class="mt-4">
                                    <p class="font-semibold text-gray-800 mb-2">Bukti Resi:</p>
                                    @php
                                        $extension = pathinfo($item->resi_file, PATHINFO_EXTENSION);
                                    @endphp

                                    @if ($extension === 'pdf')
                                    <a href="{{ asset($item->resi_file) }}" target="_blank" class="text-blue-500 underline">Lihat Resi (PNG)</a>
                                    @else
                                    <img src="{{ asset($item->resi_file) }}" alt="resi_file" class="w-48 rounded-lg mt-2">
                                    @endif

                                </div>
                            @else
                                <form action="{{ route('upload.resi', $item->id) }}" method="POST" enctype="multipart/form-data" 
                                      class="mt-6 bg-gray-50 p-4 rounded-lg border">
                                    @csrf
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Kirim Resi:</label>
                                    <input type="file" name="resi_file" accept="application/png,image/*" 
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                           file:bg-pink-500 file:text-white hover:file:bg-pink-600">

                                    <button type="submit" 
                                            class="mt-4 w-full px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
                                        Kirim Resi
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
</main>

@include('components.footer_')
