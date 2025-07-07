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
            'status' => 'required|in:pending,paid,expired,failed'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}