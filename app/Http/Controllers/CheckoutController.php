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
    private function _configureMidtrans()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout(Request $request)
    {
        $terpilih = $request->input('keranjang_terpilih', []);

        if (empty($terpilih)) {
            return redirect()->route('pages.keranjang.index')->with('error', 'Silakan pilih produk yang ingin di-checkout.');
        }

        $keranjang = Keranjang::with('produk')
            ->where('user_id', auth()->guard('pengguna')->id())
            ->whereIn('id', $terpilih)
            ->get();

        $user = auth()->guard('pengguna')->user();

        return view('pages.checkout', compact('keranjang', 'user'));
    }

    public function prosesCheckout(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $user = auth()->guard('pengguna')->user();
        $keranjangId = $request->input('keranjang_terpilih', []);

        $keranjang = Keranjang::with('produk')
            ->where('user_id', $user->id)
            ->whereIn('id', $keranjangId)
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        $total = $keranjang->sum(function ($item) {
            return $item->produk->harga * $item->kuantitas;
        });

        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'order_id' => '',
            'nama_penerima' => $request->nama_penerima,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'total' => $total,
            'metode_pembayaran' => 'midtrans',
            'status' => 'Menunggu Pembayaran',
        ]);

        $order_id = 'ORDER-' . $pesanan->id . '-' . time();
        $pesanan->order_id = $order_id;
        $pesanan->save();

        // Kurangi stok produk dan simpan detail pesanan
        foreach ($keranjang as $item) {
            if (!$item->produk) {
                return back()->with('error', 'Produk tidak ditemukan untuk item keranjang ID: ' . $item->id);
            }

            $produk = $item->produk;
            $produk->stok -= $item->kuantitas;
            if ($produk->stok < 0) {
                $produk->stok = 0;
            }
            $produk->save();

            PesananDetail::create([
                'pesanan_id' => $pesanan->id,
                'produk_id' => $produk->id_produk,
                'produk' => $produk->nama,
                'harga' => $produk->harga,
                'jumlah' => $item->kuantitas,
                'subtotal' => $produk->harga * $item->kuantitas,
            ]);
        }

        // Hapus keranjang
        Keranjang::where('user_id', $user->id)
            ->whereIn('id', $keranjangId)
            ->delete();

        $this->_configureMidtrans();

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $user->nama,
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
