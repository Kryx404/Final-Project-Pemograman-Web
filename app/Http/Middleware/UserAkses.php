<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;


class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
    {
        $userRole = $request->session()->get('role');

        if ($userRole === 'admin' || $userRole === 'user') {
            return $next($request);
        }

        return response()->json(['message' => 'Anda tidak diperbolehkan mengakses halaman ini.'], 403);
    }
}
