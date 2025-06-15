<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
       
        if (empty($query)) {
            return redirect()->back();
        }

        // Pencarian berdasarkan nama produk, kategori, atau deskripsi
        $products = Produk::where('nama', 'LIKE', '%' . $query . '%')
                         ->orWhere('kategori', 'LIKE', '%' . $query . '%')
                         ->orWhere('deskripsi', 'LIKE', '%' . $query . '%')
                         ->get();

        return view('pages.search_results', [
            'products' => $products,
            'query' => $query,
            'count' => $products->count()
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('q');
       
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = Produk::where('nama', 'LIKE', '%' . $query . '%')
                            ->limit(5)
                            ->pluck('nama')
                            ->toArray();

        return response()->json($suggestions);
    }
}