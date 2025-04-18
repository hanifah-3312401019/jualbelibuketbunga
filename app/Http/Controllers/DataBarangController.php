<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    public function getData()
    {
        // Logika untuk mendapatkan array data
        return [
            ['id' => 1, 'nama' => 'Buket bunga tulip', 'harga' => 22000],
            ['id' => 2, 'nama' => 'Buket bunga mawar', 'harga' => 99000],
            ['id' => 3, 'nama' => 'Buket bunga matahari', 'harga' => 56000],
        ];
    }

    public function tampilkan()
    {
        $data = $this->getData();
        return view('data_barang', compact('data')); // Ubah dari 'list_barang' ke 'list_produk'
    }
}