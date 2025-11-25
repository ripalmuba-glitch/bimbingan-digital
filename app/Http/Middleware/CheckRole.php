<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
    // Cek apakah user sudah login dan apakah role-nya sesuai
    if (! $request->user() || $request->user()->role !== $role) {
        // Jika tidak sesuai, abort 403 (Forbidden) atau redirect
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    return $next($request);
    }
}
