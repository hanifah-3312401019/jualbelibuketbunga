<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class SignupController extends Controller
{
    public function showSignup()
    {
        return view('pages.signup');
    }

    public function register(Request $request)
    {
        // Validasi email khusus - boleh menggunakan email penjual
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:pengguna,email',

            ],
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Buat user baru dengan role pembeli - sesuai struktur database
        Pengguna::create([
            'nama' => $request->name, // menggunakan 'nama' sesuai struktur database
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_pengguna' => $request->name, // isi juga nama_pengguna
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login untuk melanjutkan.');
    }
}