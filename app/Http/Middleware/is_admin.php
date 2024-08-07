<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role != "admin") {
            return response()->json('Opps! Kamu tidak memiliki permisi untuk akses.');
        }
        // if (Auth::user()->id=='mhs') {
        //     abort(403);
        // }

        return $next($request);

    }
}
