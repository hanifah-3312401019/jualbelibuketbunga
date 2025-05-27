<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $userRole = session('user_role');

        // Jika tidak ada role di session, cek dari auth user
        /** @var \Illuminate\Contracts\Auth\Guard $auth */
        $auth = auth();

        if (!$userRole && $auth->check()) {
            $userRole = 'pembeli'; // Default untuk user dari database
        }

        if ($userRole !== $role) {
            // Redirect berdasarkan role yang dimiliki
            if ($userRole === 'penjual') {
                return redirect('/dashboard-penjual')->with('error', 'Akses ditolak.');
            } else {
                return redirect('/halaman_utama')->with('error', 'Akses ditolak.');
            }
        }

        return $next($request);
    }
}
