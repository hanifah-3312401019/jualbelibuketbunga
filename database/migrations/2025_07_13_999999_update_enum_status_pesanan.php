<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Ubah data lama agar sesuai dengan enum baru
        DB::table('pesanan')->where('status', 'Menunggu Pembayaran')->update(['status' => 'Lunas']);
        DB::table('pesanan')->where('status', 'Gagal')->update(['status' => 'Kadaluarsa']);

        // Update struktur enum status
        Schema::table('pesanan', function (Blueprint $table) {
            $table->enum('status', [
                'Lunas',
                'Menunggu Konfirmasi',
                'Sedang Dikemas',
                'Dikirim',
                'Selesai',
                'Kadaluarsa'
            ])->default('Lunas')->change();
        });
    }

    public function down(): void
    {
        // Balik isi data ke status sebelumnya
        DB::table('pesanan')->where('status', 'Lunas')->update(['status' => 'Menunggu Pembayaran']);
        DB::table('pesanan')->where('status', 'Kadaluarsa')->update(['status' => 'Gagal']);

        // Balik struktur enum seperti sebelumnya
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
};
