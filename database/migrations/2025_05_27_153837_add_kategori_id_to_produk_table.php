<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriIdToProdukTable extends Migration
{
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable()->after('id_produk');
            $table->foreign('kategori_id')->references('id')->on('kategori_produk')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
}
