<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategoris = KategoriProduk::all();
        return view('pages.kategori_produk', compact('kategoris'));
    }

    public function create()
    {
        return view('pages.tambah_kategori_produk');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori_produk,nama',
        ]);

        KategoriProduk::create(['nama' => $request->nama]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        return view('pages.edit_kategori_produk', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriProduk::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori_produk,nama,' . $kategori->id,
        ]);

        $kategori->update(['nama' => $request->nama]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kategori = KategoriProduk::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
