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
        $jumlahRekapPenjualan = Pesanan::where('status', 'paid')->count();

        return view('pages.dashboard_penjual', compact('jumlahProduk', 'jumlahRekapPenjualan'));
    }
}
