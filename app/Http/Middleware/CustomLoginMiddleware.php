<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('custom_login') || !$request->user()->is_verified) {
            return redirect('/');
        }

        return $next($request);
    }
}
