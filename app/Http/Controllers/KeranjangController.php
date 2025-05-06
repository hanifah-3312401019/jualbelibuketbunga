<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        return view('pages.keranjang');
    }

    public function store(Request $request)
    {
    return redirect()->route('pages.keranjang')->with('info', 'Produk berhasil ditambahkan ke keranjang.');
    }
}