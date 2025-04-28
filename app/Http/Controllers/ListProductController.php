<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function show()
    {
        $data = [
            'id' => 22,
            'product' => 'Buket bunga tulip'
        ];
        return view('list_product', $data);
    }
}