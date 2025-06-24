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

        if ($status == 'settlement') {
            $pesanan->status = 'paid';
        } elseif ($status == 'expire') {
            $pesanan->status = 'expired';
        } elseif ($status == 'cancel' || $status == 'deny') {
            $pesanan->status = 'failed';
        } else {
            $pesanan->status = $status;
        }

        $pesanan->save();

        Log::info("✅ Callback berhasil untuk order_id $orderId, status: $status");

        return response()->json(['message' => 'Callback berhasil.']);
    } catch (\Exception $e) {
        Log::error('❌ Callback Error: ' . $e->getMessage());
        return response()->json(['error' => 'Internal server error.'], 500);
    }
}

}
