<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'nama_penerima',
        'telepon',
        'alamat',
        'total',
        'metode_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
{
    return $this->hasMany(\App\Models\PesananDetail::class, 'pesanan_id');
}

}
