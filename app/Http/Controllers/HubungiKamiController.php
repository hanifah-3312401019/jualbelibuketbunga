<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HubungiKamiController extends Controller
{
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'layanan' => 'required|string',
            'telepon' => 'required|string',
            'pesan' => 'required|string',
        ]);

        Mail::send('emails.hubungi_kami', ['data' => $data], function ($message) use ($data) {
            $message->to('pblbloomify@gmail.com')
                    ->subject('Pesan Baru dari ' . $data['nama']);
        });

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! terima kasih telah mengirimkan pesan (❀ ˵❛ ֊ ❛˵) ♡');
    }
}
