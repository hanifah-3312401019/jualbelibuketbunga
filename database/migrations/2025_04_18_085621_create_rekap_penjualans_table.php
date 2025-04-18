<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekap_penjualans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->integer('jumlah_produk');
            $table->integer('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_penjualans');
    }
};
