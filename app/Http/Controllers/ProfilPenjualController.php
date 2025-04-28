<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilPenjualController extends Controller
{
    public function edit()
    {
        return view('pages.profil_penjual');
    }
}
