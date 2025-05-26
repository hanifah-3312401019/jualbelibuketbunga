<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukFoto;
use Illuminate\Http\Request;

class ProdukPenjualController extends Controller
{
    public function index()
    {
        // Ambil semua produk beserta 1 foto
        $produks = Produk::with('foto')->get();
        return view('pages.daftar_produk', compact('produks'));
    }

    public function create()
    {
        return view('pages.tambah_produk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $nama_file = time() . '-' . $foto->getClientOriginalName();
                $foto->move(public_path('images/produk'), $nama_file);

                ProdukFoto::create([
                    'produk_id' => $produk->id,
                    'path' => 'images/produk/' . $nama_file,
                ]);
            }
        }

        return redirect()->route('produk-penjual.index')->with('success', 'Produk berhasil ditambahkan');
    }
}
