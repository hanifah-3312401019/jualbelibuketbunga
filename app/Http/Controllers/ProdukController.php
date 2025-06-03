<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
       $products = Produk::all();
        return view('pages.produk', ['products' => $products]);
    }
}
?>