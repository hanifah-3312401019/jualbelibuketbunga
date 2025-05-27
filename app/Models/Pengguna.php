<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $table = 'pengguna'; // Remove the 'string' type declaration

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nama_pengguna',
        'no_telepon',
        'foto',
        // Add other fillable fields as needed
    ];

    // If you want to hide certain attributes when the model is converted to array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // If you want to cast attributes to specific types
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+ automatic password hashing
    ];
}