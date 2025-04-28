<?php

namespace App\Http\Controllers;

use App\Models\RekapPenjualan;
use Illuminate\Http\Request;

class RekapPenjualanController extends Controller
{
    public function index()
    {
        $rekapPenjualan = RekapPenjualan::all();
        return view('pages.rekap_penjualan', compact('rekapPenjualan'));
    }
}
