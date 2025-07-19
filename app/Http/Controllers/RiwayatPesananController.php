<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class RiwayatPesananController extends Controller
{
    public function index(Request $request)
{
    $userId = auth()->id();

    $query = Pesanan::with('detail.produk')
        ->where('user_id', $userId);

    if ($request->filter == 'today') {
        $query->whereDate('created_at', \Carbon\Carbon::today());
    } elseif ($request->filter == 'week') {
        $query->whereBetween('created_at', [
            \Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()
        ]);
    } elseif ($request->filter == 'month') {
        $query->whereMonth('created_at', \Carbon\Carbon::now()->month)
              ->whereYear('created_at', \Carbon\Carbon::now()->year);
    }

    $pesanan = $query->latest()->get();

    return view('pages.riwayat-pesanan', compact('pesanan'));
}
    public function uploadResi(Request $request, $id)
{
    $request->validate([
        'resi_file' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
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
