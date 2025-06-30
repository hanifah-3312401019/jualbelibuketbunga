<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'pengguna'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'penggunas'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'penggunas', // boleh pakai ini jika tetap ingin 'web' bisa login pembeli
        ],
        'pengguna' => [
            'driver' => 'session',
            'provider' => 'penggunas', // ✅ guard utama untuk pembeli
        ],
        'penjual' => [
            'driver' => 'session',
            'provider' => 'pengguna', // ✅ pakai provider beda jika mau dibedakan model (opsional)
        ],
    ],

    'providers' => [
        'pengguna' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class,
        ],
        'penggunas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class,
        ],
    ],

    'passwords' => [
        'penggunas' => [
            'provider' => 'penggunas',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
