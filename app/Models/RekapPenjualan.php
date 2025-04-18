<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapPenjualan extends Model
{
    protected $fillable = [
        'tanggal',
        'nama_produk',
        'harga_produk',
        'jumlah_produk',
        'total_harga',
    ];
}
