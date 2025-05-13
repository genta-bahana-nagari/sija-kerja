<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan memiliki salah satu role yang dibutuhkan
        if (!auth()->check() || !auth()->user()->hasAnyRole(['super_admin', 'Siswa', 'Guru'])) {
            // Jika tidak, kembalikan 403 Forbidden
            abort(403, 'Anda belum punya akses. Silakan hubungi admin :)');
        }

        return $next($request);
    }
}
