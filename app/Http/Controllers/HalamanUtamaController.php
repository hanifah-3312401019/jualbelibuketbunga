<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class HalamanUtamaController extends Controller
{
    public function index()
    {
       $products = Produk::all();
        return view('pages.halaman_utama', ['products' => $products]);
    }

    public function show($id)
    {
      $produk = \App\Models\Produk::findOrFail($id);
       return view('pages.detail-produk', ['produk' => $produk]);
    }
    }
