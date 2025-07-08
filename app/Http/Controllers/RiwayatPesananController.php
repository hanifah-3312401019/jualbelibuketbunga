<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class RiwayatPesananController extends Controller
{
    public function index()
{
    $userId = auth()->id();
    $pesanan = Pesanan::with('detail.produk') // ini penting
        ->where('user_id', $userId)
        ->latest()
        ->get();

    return view('pages.riwayat-pesanan', compact('pesanan'));
}

}
