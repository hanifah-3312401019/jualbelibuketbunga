<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');

            $notif = new Notification();

            Log::info('📦 Callback diterima:', (array) $notif);

            $orderId = $notif->order_id;
            $status = $notif->transaction_status ?? '';

            if (!$orderId) {
                Log::error('Order ID tidak ditemukan dalam callback.');
                return response()->json(['message' => 'Order ID tidak valid.'], 400);
            }

            $pesanan = Pesanan::where('order_id', $orderId)->first();

            if (!$pesanan) {
                Log::error('Pesanan tidak ditemukan untuk order_id: ' . $orderId);
                return response()->json(['message' => 'Pesanan tidak ditemukan.'], 404);
            }

            // Map status midtrans ke enum Bahasa Indonesia
            switch ($status) {
                case 'settlement':
                    $pesanan->status = 'Lunas';
                    break;
                case 'pending':
                    $pesanan->status = 'Menunggu Pembayaran';
                    break;
                case 'expire':
                    $pesanan->status = 'Kadaluarsa';
                    break;
                case 'cancel':
                case 'deny':
                case 'failure':
                    $pesanan->status = 'Gagal';
                    break;
                default:
                    $pesanan->status = 'Menunggu Pembayaran';
                    break;
            }

            $pesanan->save();

            Log::info("✅ Callback berhasil untuk order_id $orderId, status: $status → {$pesanan->status}");

            return response()->json(['message' => 'Callback berhasil.']);
        } catch (\Exception $e) {
            Log::error('❌ Callback Error: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error.'], 500);
        }
    }
}
