<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukPenjualController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pages.daftar_produk', compact('produks'));
    }

    public function create()
    {
        return view('pages.tambah_produk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $filename = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/produk'), $filename);
            $data['gambar'] = 'images/produk/' . $filename;
        }

        Produk::create($data);

        return redirect()->route('produk-penjual.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.edit_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $filename = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/produk'), $filename);
            $data['gambar'] = 'images/produk/' . $filename;
        } else {
            unset($data['gambar']);
        }

        $produk->update($data);

        return redirect()->route('produk-penjual.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk-penjual.index')->with('success', 'Produk berhasil dihapus!');
    }
}
