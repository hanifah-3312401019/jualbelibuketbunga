<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DaftarPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('detail.produk', 'user')->get();
        return view('pages.daftar-pesanan', compact('pesanan'));
    }

    public function produk()
    {
    return $this->belongsTo(Produk::class, 'produk_id'); // atau 'id_produk' jika beda
    }
}