<?php

namespace App\Http\Controllers;

use Illuminate\HttpRequest;

class ProductController extends Controller
{
    public function show()
    {
        $data = [
            ['id' => 1, 'produk' => 'Buket Mawar Putih'],
            ['id' => 2, 'produk' => 'Buket Tulip Pink'],
            ['id' => 3, 'produk' => 'Buket Lily Putih']
        ];


        return view('list_product', compact('data'));
    }
}