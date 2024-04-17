<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IsUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role != 'admin') {
                return $next($request);
            }
            throw new HttpException(404, 'Access not allowed');
        }

        return redirect()->route('index.userLogin');
    }
}
