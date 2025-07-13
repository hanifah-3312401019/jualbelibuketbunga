<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardPenjualController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count();
        $jumlahStokTersisa = Produk::sum('stok');
        $jumlahRekapPenjualan = Pesanan::where('status', 'Lunas')->count();

        return view('pages.dashboard_penjual', compact(
            'jumlahProduk', 
            'jumlahStokTersisa',
            'jumlahRekapPenjualan'
        ));
    }
}
