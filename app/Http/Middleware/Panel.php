<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Illuminate\Support\Facades\Auth;

class Panel extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Closure $next
     * @return string
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role >= 2) {
            return $next($request);
        }
        return redirect('/');
    }
}
