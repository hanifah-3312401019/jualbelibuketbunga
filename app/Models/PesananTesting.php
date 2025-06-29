<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananTesting extends Model
{
    protected $table = 'pesanan_testing'; // pastikan nama tabel sesuai
    protected $fillable = [
        'user_id', 'order_id', 'nama_penerima', 'telepon', 'alamat', 'total', 'status'
    ];
}
