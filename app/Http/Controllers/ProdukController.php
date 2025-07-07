<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        // Pagination 12 produk per halaman + hanya ambil kolom yang diperlukan
        $products = Produk::select('id_produk', 'nama', 'harga', 'gambar')
                          ->paginate(12);
        
        return view('pages.produk', ['products' => $products]);
    }

    public function show($id)
    {
        $produk = \App\Models\Produk::findOrFail($id);
        return view('pages.detail-produk', ['produk' => $produk]);
    }
}
?>