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

        // Login untuk penjual (hardcoded)
        if ($request->email == 'bloomify@gmail.com' && $request->password == 'admin123') {
            $penjual = Pengguna::where('email', $request->email)->first();

            if ($penjual) {
                Auth::guard('penjual')->login($penjual); // Pakai guard penjual
                return redirect('/dashboard-penjual')->with('success', 'Selamat datang, Penjual!');
            }

            return back()->withErrors(['email' => 'Penjual tidak ditemukan di database.']);
        }

        // Login pembeli (dengan guard pengguna)
        $user = Pengguna::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {
            Auth::guard('pengguna')->login($user); // 🔄 pakai guard pengguna

            // Set session tambahan
            session([
                'user_id' => $user->id,
                'user_name' => $user->nama,
                'user_email' => $user->email,
                'user_role' => 'pembeli'
            ]);

            return redirect('/halaman_utama')->with('success', 'Selamat datang, ' . $user->nama . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak valid. Pembeli harus registrasi terlebih dahulu.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('pengguna')->logout(); // 🔄 gunakan guard pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
