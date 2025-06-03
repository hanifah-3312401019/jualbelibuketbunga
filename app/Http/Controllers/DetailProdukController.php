<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class DetailProdukController extends Controller
{
    public function show($id)
    {
        $produk = Produk::findOrFail($id); // ambil produk berdasarkan id, jika tidak ada error 404
        return view('pages.detail-produk.show', compact('produk'));
    }

    public function index()
    {
        return redirect('/produk');
    }
}
