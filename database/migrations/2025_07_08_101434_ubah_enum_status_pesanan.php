<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Ubah dulu semua data agar tidak melanggar enum baru
        DB::table('pesanan')->where('status', 'pending')->update(['status' => 'Menunggu Pembayaran']);
        DB::table('pesanan')->where('status', 'paid')->update(['status' => 'Lunas']);
        DB::table('pesanan')->where('status', 'expired')->update(['status' => 'Kadaluarsa']);
        DB::table('pesanan')->where('status', 'failed')->update(['status' => 'Gagal']);

        Schema::table('pesanan', function (Blueprint $table) {
            $table->enum('status', [
                'Menunggu Pembayaran',
                'Lunas',
                'Dikirim',
                'Kadaluarsa',
                'Gagal'
            ])->default('Menunggu Pembayaran')->change();
        });
    }

    public function down(): void
    {
        // Ubah balik ke enum lama kalau rollback
        DB::table('pesanan')->where('status', 'Menunggu Pembayaran')->update(['status' => 'pending']);
        DB::table('pesanan')->where('status', 'Lunas')->update(['status' => 'paid']);
        DB::table('pesanan')->where('status', 'Kadaluarsa')->update(['status' => 'expired']);
        DB::table('pesanan')->where('status', 'Gagal')->update(['status' => 'failed']);
        DB::table('pesanan')->where('status', 'Dikirim')->update(['status' => 'dikirim']);

        Schema::table('pesanan', function (Blueprint $table) {
            $table->enum('status', [
                'pending',
                'paid',
                'expired',
                'failed'
            ])->default('pending')->change();
        });
    }
};
