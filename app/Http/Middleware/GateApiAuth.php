<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GateApiAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Accept all requests without any checks
        return $next($request);
    }
}