<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('produk')
            ->where('pengguna_id', auth()->guard('pengguna')->id()) // ✅ disesuaikan
            ->get();

        return view('pages.keranjang', compact('keranjang'));
    }

    public function store(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $kuantitas = $request->quantity ?? 1;

        if ($kuantitas > $produk->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        // CEK APAKAH PRODUK SUDAH ADA DI KERANJANG PENGGUNA YANG SAMA
        $keranjang = Keranjang::where('pengguna_id', auth()->guard('pengguna')->id())
            ->where('produk_id', $request->produk_id)
            ->first();

        if ($keranjang) {
            // GABUNGKAN KUANTITAS
            $kuantitasBaru = $keranjang->kuantitas + $kuantitas;

            if ($kuantitasBaru > $produk->stok) {
                return redirect()->back()->with('error', 'Total kuantitas melebihi stok.');
            }

            $keranjang->update([
                'kuantitas' => $kuantitasBaru
            ]);
        } else {
            // JIKA BELUM ADA, BUAT BARU
            Keranjang::create([
                'produk_id' => $request->produk_id,
                'kuantitas' => $kuantitas,
                'pengguna_id' => auth()->guard('pengguna')->id(), // ✅ disesuaikan
            ]);
        }

        return redirect()->route('pages.keranjang.index')
            ->with('info', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);
        $produk = $item->produk;

        if ($request->kuantitas > $produk->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        $item->update([
            'kuantitas' => $request->kuantitas
        ]);

        return redirect()->route('pages.keranjang.index')
            ->with('info', 'Kuantitas diperbarui.');
    }

    public function destroy($id)
    {
        Keranjang::findOrFail($id)->delete();

        return redirect()->route('pages.keranjang.index')
            ->with('info', 'Produk dihapus dari keranjang.');
    }

    public function clear()
    {
        Keranjang::where('pengguna_id', auth()->guard('pengguna')->id())->delete(); // ✅ disesuaikan

        return redirect()->route('pages.keranjang.index')
            ->with('info', 'Keranjang dikosongkan.');
    }
}
