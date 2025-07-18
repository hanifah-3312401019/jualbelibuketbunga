<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesanan;
use App\Models\Produk;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail';

    protected $fillable = [
    'id',
    'pesanan_id',
    'produk_id',
    'harga',
    'jumlah',
    'subtotal',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'produk_id', 'id_produk');
    }
}
