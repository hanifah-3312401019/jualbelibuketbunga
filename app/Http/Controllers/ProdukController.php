<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Buket Bunga Tulip Biru', 'price' => 190000, 'image' => 'bukettulip.png'],
            ['name' => 'Buket Bunga Daisy Putih', 'price' => 220000, 'image' => 'buketdaisy.png'],
            ['name' => 'Buket Bunga Mawar Pink', 'price' => 235000, 'image' => 'buketmawar.png'],
            ['name' => 'Buket Bunga Mawar Putih', 'price' => 263000, 'image' => 'buketmawarputih.png'],
            ['name' => 'Buket Bunga Tulip Biru', 'price' => 190000, 'image' => 'bukettulip.png'],
            ['name' => 'Buket Bunga Daisy Putih', 'price' => 220000, 'image' => 'buketdaisy.png'],
            ['name' => 'Buket Bunga Mawar Pink', 'price' => 235000, 'image' => 'buketmawar.png'],
            ['name' => 'Buket Bunga Mawar Putih', 'price' => 263000, 'image' => 'buketmawarputih.png'],
        ];

        // Ganti 'product' jadi 'produk'
        return view('produk', ['products' => $products]);
    }
}
?>