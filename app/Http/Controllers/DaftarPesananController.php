<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;

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

        $pesanan = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.daftar-pesanan', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Lunas,Menunggu Konfirmasi,Sedang Dikemas,Dikirim,Selesai,Kadaluarsa'
        ]);

        $pesanan = Pesanan::with('detail.produk')->findOrFail($id);
        $statusLama = $pesanan->status;
        $pesanan->status = $request->status;
        $pesanan->save();

        // Kurangi stok HANYA jika dari status non-Lunas → ke Lunas
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

    public function uploadResi(Request $request, $id)
{
    $request->validate([
        'resi_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    $pesanan = Pesanan::findOrFail($id);

    if ($request->hasFile('resi_file')) {
        $file = $request->file('resi_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/resi'), $filename);

        $pesanan->resi_file = 'images/resi/' . $filename;
        $pesanan->save();
    }

    return back()->with('success', 'Resi berhasil diupload');
}

}