<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
     if(Auth::check() && Auth::user()->role === 'admin')
        {

            return redirect('/admin');

        }

     return $next($request);

    }
}


