<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPenjualController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login_penjual');
    }
}
