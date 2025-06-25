<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananTesting;

class RiwayatPesananController extends Controller
{
    public function index()
{
    $userId = auth()->id();
    $pesanan = \App\Models\PesananTesting::where('user_id', $userId)->latest()->get();

    return view('pages.riwayat-pesanan', compact('pesanan'));
}

}
