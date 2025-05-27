<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriProdukTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_produk', function (Blueprint $table) {
            $table->bigIncrements('id'); // primary key
            $table->string('nama');      // nama kategori
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_produk');
    }
}
