<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';           // Sesuai nama tabel di database
    protected $primaryKey = 'id_produk';  
    public $incrementing = true;           
    protected $keyType = 'int';            

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'kategori_id',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }
}
