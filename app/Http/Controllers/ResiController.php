<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResiController extends Controller
{
    public function index()
{
    $pesanan = \App\Models\Pesanan::with('detail')->where('user_id', auth()->id())->latest()->first();

    return view('pages.resi', compact('pesanan'));
}

}
