<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 6 karakter.',
    ]);

        // Login untuk penjual (hardcoded) - sesuai permintaan: bloomify@gmail.com
        if ($request->email == 'bloomify@gmail.com' && $request->password == 'admin123') {
    // Ambil user penjual dari database
    $penjual = Pengguna::where('email', $request->email)->first();

    if ($penjual) {
        Auth::guard('penjual')->login($penjual); // pakai guard penjual
        return redirect('/dashboard-penjual')->with('success', 'Selamat datang, Penjual!');
    }

    return back()->withErrors(['email' => 'Penjual tidak ditemukan di database.']);
}

        // Login untuk pembeli (menggunakan database)
        $user = Pengguna::where('email', $request->email)->first();
        
        if ($user && password_verify($request->password, $user->password)) {
            // Login berhasil untuk pembeli
            Auth::login($user);
            
            // Set session tambahan
            session([
                'user_id' => $user->id,
                'user_name' => $user->nama, // menggunakan 'nama' sesuai struktur database
                'user_email' => $user->email,
                'user_role' => 'pembeli' // default pembeli
            ]);
            
            return redirect('/halaman_utama')->with('success', 'Selamat datang, ' . $user->nama . '!');
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak valid. Pembeli harus registrasi terlebih dahulu.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}