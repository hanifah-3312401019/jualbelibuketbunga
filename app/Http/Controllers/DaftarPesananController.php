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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,expired,failed'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}