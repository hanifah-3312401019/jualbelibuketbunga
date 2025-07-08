<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdukIdToPesananDetailTable extends Migration
{
    public function up(): void
    {
        Schema::table('pesanan_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->after('pesanan_id')->nullable();

            // Jika ingin enforce relasi foreign key (pastikan tabel produk.id_produk benar)
            $table->foreign('produk_id')->references('id_produk')->on('produk')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('pesanan_detail', function (Blueprint $table) {
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
        });
    }
}
