<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->integer('kuantitas');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            // Tambahkan foreign key constraints jika diperlukan
            $table->foreign('produk_id')->references('id_produk')->on('produk');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}