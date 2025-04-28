<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatagoriProdukController extends Controller
{
    public function index()
    {
        // Untuk sekarang data bisa kosong / dummy
        $kategoris = [
            ['nama_kategori' => 'MATAHARI']
        ];

        return view('pages.katagori_produk', compact('kategoris'));
    }
}
