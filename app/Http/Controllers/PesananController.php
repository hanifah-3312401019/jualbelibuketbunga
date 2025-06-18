<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('produk', 'user')->get();
        return view('pages.pesanan', compact('pesanan'));
    }
}