<!DOCTYPE html>
<html>
<head>
    <title>Rekap Penjualan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        img { height: 70px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/Bloomify.png') }}" alt="Logo">
        <h2>Bloomify - Rekap Penjualan ({{ ucfirst($filter) }})</h2>
    </div>

    <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>

    <table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekapPenjualan as $index => $rekap)
            @foreach ($rekap->detail as $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($rekap->created_at)->format('d M Y') }}</td>
                <td>{{ $item->produk->nama ?? '-' }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
</body>
</html>
