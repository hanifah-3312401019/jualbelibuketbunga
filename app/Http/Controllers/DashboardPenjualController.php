<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\RekapPenjualan;
use Illuminate\Http\Request;

class DashboardPenjualController extends Controller
{
    public function index()
    {
        $jumlahProduk = Produk::count();
        $jumlahRekapPenjualan = RekapPenjualan::count();

        return view('dashboard_penjual.index', compact('jumlahProduk', 'jumlahRekapPenjualan'));
    }
}
