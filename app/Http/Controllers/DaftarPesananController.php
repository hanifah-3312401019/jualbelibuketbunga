<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DaftarPesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with('detail.produk', 'pengguna');

        // Filter berdasarkan waktu
        if ($request->filter == 'today') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($request->filter == 'week') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
            ]);
        } elseif ($request->filter == 'month') {
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        }

        $pesanan = $query->orderBy('created_at', 'desc')->get();

        return view('pages.daftar-pesanan', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Pembayaran,Lunas,Dikirim,Kadaluarsa,Gagal'
        ]);


        $pesanan = Pesanan::with('detail.produk')->findOrFail($id);
        $statusLama = $pesanan->status;
        $pesanan->status = $request->status;
        $pesanan->save();

        // Kurangi stok jika baru diubah jadi 'paid'
        if ($statusLama !== 'Lunas' && $request->status === 'Lunas') {
            foreach ($pesanan->detail as $item) {
        if ($item->produk && is_object($item->produk)) {
            $item->produk->stok = max(0, $item->produk->stok - $item->jumlah);
            $item->produk->save();
        }
}
        }

        return redirect()->route('pesanan.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}