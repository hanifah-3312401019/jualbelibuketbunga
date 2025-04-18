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
                'gambar' => 'tim2.jpg',
            ],
            [
                'nama' => 'Christine Thalia',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim2.jpg',
            ],
            [
                'nama' => 'Aulia Salsabilla',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim2.jpg',
            ],
            [
                'nama' => 'Enjelina Saruksuk',
                'jabatan' => 'Full-Stack Developer',
                'gambar' => 'tim2.jpg',
            ],
        ];

        return view('tentang_kami', compact('timPengembang'));
    }
}
?>