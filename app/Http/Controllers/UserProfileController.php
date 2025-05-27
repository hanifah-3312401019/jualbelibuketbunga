<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('pages.editprofilpembeli', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Pengguna::find(Auth::id());

        $user->nama = $request->nama;
        $user->nama_pengguna = $request->nama_pengguna;
        $user->email = $request->email;
        $user->no_telepon = $request->no_telepon;
        $user->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
