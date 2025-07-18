<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $timPengembang = [
            [
                'nama' => 'Hanifah Dwi Cahayarani',
                'jabatan' => 'UI/UX Designer & Full-Stack Developer',
                'gambar' => 'hani.png',
            ],
            [
                'nama' => 'Christine Thalia',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim4.jpg',
            ],
            [
                'nama' => 'Aulia Salsabilla',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim2.png',
            ],
            [
                'nama' => 'Enjelina Saruksuk',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim3.png',
            ],
        ];

        return view('pages.tentang_kami', compact('timPengembang'));
    }
}
?>