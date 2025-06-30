<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_penerima');
            $table->string('telepon');
            $table->text('alamat');
            $table->integer('total');
            $table->string('metode_pembayaran');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('pengguna')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
