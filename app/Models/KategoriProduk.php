<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produk';

    protected $fillable = ['nama'];

    // Relasi kategori ke produk (one-to-many)
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
