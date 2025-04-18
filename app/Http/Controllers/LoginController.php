<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if ($request->email == 'admin@gmail.com' && $request->password == 'admin123') {
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }
}
