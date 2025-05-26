<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // <- sudah sesuai

    public $timestamps = true; // <- jika pakai created_at dan updated_at

    protected $fillable = ['nama', 'deskripsi', 'harga', 'stok'];

    public function foto()
    {
        return $this->hasMany(ProdukFoto::class);
    }
}
