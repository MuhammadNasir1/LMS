<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user_det')) {
            return redirect('login') ;// Redirect to the login page if the user is not authenticated
            // return redirect()->route('login'); // Redirect to the login page if the user is not authenticated
        }

        return $next($request);
    }
}
