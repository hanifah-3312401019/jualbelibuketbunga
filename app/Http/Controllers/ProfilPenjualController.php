<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilPenjualController extends Controller
{
    public function edit()
{
    $penjual = Auth::guard('penjual')->user();

    return view('pages.profil_penjual', compact('penjual'));
}

public function update(Request $request)
{
    $penjual = Auth::guard('penjual')->user();

    if (!$penjual) {
        return redirect()->route('login.penjual')->withErrors('Silakan login terlebih dahulu.');
    }

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'no_telepon' => 'required|string|max:20',
        'alamat' => 'nullable|string',
        'nama_pengguna' => 'nullable|string|max:255',
        'foto' => 'nullable|image|max:2048',
    ]);

    $penjual->nama = $request->nama;
    $penjual->email = $request->email;
    $penjual->no_telepon = $request->no_telepon;
    $penjual->alamat = $request->alamat;
    $penjual->nama_pengguna = $request->nama_pengguna;

    if ($request->hasFile('foto')) {
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $fileName);
        $penjual->foto = $fileName;
    }

    
    $penjual->save();

    return redirect()->route('profil.penjual')->with('success', 'Profil berhasil diperbarui!');
}


}
