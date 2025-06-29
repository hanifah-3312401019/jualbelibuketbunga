<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekapPenjualan as $index => $rekap)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($rekap->created_at)->format('d M Y') }}</td>
            <td>Rp {{ number_format($rekap->total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2"><strong>Total Pendapatan:</strong></td>
            <td><strong>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</strong></td>
        </tr>
    </tbody>
</table>
