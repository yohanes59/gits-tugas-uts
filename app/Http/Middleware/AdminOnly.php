<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role != 'Admin') {
            return redirect('/cashier/order');
        }

        return $next($request);
    }
}
