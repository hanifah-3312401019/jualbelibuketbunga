<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapPenjualan extends Model
{
    protected $table = 'rekap_penjualan'; // <- ini penting

    // kalau kamu pakai timestamps (created_at, updated_at), pastikan ini tetap
    public $timestamps = true;
}
