<!DOCTYPE html>
<html>
<head>
    <title>Rekap Penjualan</title>
    <style>
        body { font-family: sans-serif; text-align: center; }
        .header img { height: 70px; }
        .total { margin-top: 20px; font-size: 18px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logo Bloomify.png') }}" alt="Logo">
        <h2>Bloomify - Rekap Penjualan ({{ ucfirst($filter) }})</h2>
    </div>

    <div class="total">
        <p><strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    </div>
</body>
</html>
