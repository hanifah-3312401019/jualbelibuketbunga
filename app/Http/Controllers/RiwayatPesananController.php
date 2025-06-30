<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $pesanan = Pesanan::where('pengguna_id', $userId)->latest()->get();

        return view('pages.riwayat-pesanan', compact('pesanan'));
    }
}
