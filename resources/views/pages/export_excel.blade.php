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
        <tr>
            <td colspan="5"><strong>Total Pendapatan:</strong></td>
            <td><strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></td>
        </tr>
    </tbody>
</table>
