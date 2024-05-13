<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;

// class UserAkses
class AdminAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {


        if(Auth::user()->role == 'admin'){
            return $next($request);
    }

    abort(403, 'anda tidak memiliki akses');


     }
    //  {
    //      if(Auth::check() && Auth::user()->role === 'admin'){
    //          return $next($request);
    //      }

    //      abort(403);
    //  }

    }
