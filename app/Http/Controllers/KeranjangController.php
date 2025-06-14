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
            ->where('user_id', auth()->id())
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

        Keranjang::create([
            'produk_id' => $request->produk_id,
            'kuantitas' => $kuantitas,
            'user_id' => auth()->id(),
        ]);

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
        Keranjang::where('user_id', auth()->id())->delete();

        return redirect()->route('pages.keranjang.index')
            ->with('info', 'Keranjang dikosongkan.');
    }
}

