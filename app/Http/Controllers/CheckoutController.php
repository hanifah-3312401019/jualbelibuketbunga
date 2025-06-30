<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    // Konfigurasi Midtrans
    private function _configureMidtrans()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout()
    {
        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->get();

        return view('pages.checkout', compact('keranjang'));
    }

    public function prosesCheckout(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            // metode_pembayaran tidak perlu lagi divalidasi
        ]);

        $user = Auth::user();
        $keranjang = Keranjang::with('produk')
            ->where('user_id', $user->id)
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kamu kosong.');
        }

        // Hitung total
        $total = $keranjang->sum(function ($item) {
            return $item->produk->harga * $item->kuantitas;
        });

        // Simpan pesanan
        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'order_id' => '', // sementara kosong
            'nama_penerima' => $request->nama_penerima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'total' => $total,
            'metode_pembayaran' => 'midtrans',
            'status' => 'pending',
        ]);
        
        $order_id = 'ORDER-' . $pesanan->id . '-' . time();
        $pesanan->order_id = $order_id;
        $pesanan->save();

        // Simpan detail pesanan
        foreach ($keranjang as $item) {
            if (!$item->produk) {
                return back()->with('error', 'Produk tidak ditemukan untuk item keranjang ID: ' . $item->id);
            }

            PesananDetail::create([
                'pesanan_id' => $pesanan->id,
                'produk' => $item->produk->nama ?? 'Tidak diketahui',
                'harga' => $item->produk->harga ?? 0,
                'jumlah' => $item->kuantitas,
                'subtotal' => ($item->produk->harga ?? 0) * $item->kuantitas,
            ]);
        }

        // Hapus keranjang setelah pesanan dibuat
        Keranjang::where('user_id', $user->id)->delete();

        // Midtrans Snap Token
        $this->_configureMidtrans();

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $total,
            ],
            
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $request->telepon,
            ],
        ];

        try {
    $snapToken = Snap::getSnapToken($params);
} catch (\Exception $e) {
    dd('Gagal generate SnapToken:', $e->getMessage());
}

        return view('pages.midtrans-payment', compact('snapToken', 'pesanan'));
    }
}
