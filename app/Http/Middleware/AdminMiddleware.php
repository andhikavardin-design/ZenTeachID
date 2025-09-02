<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Cek jika session admin_logged_in = true
        if (session()->has('admin_logged_in') && session('admin_logged_in') === true) {
            return $next($request);
        }

        // Jika tidak, redirect ke login admin
        return redirect()->route('admin.login')->with('error', 'Anda harus login sebagai admin terlebih dahulu.');
    }
}
