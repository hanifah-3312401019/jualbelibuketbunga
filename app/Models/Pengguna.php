<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nama_pengguna',
        'no_telepon',
        'foto',
        // Tambahkan field lain jika ada
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator untuk otomatis hash password jika belum di-hash.
     */
    public function setPasswordAttribute($value)
    {
        // Jika sudah ter-hash (pakai bcrypt), jangan hash ulang
        $this->attributes['password'] = \Illuminate\Support\Str::startsWith($value, '$2y$')
            ? $value
            : bcrypt($value);
    }
}
