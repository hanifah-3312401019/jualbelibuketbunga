<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['produk_id', 'kuantitas', 'user_id']; // ✅ ganti user_id

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id_produk');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id'); // ✅ ganti user() → pengguna()
    }
}

