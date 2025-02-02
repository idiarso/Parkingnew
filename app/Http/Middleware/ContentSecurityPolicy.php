<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        $response->headers->set('Content-Security-Policy', 
            "default-src 'self'; ".
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https:; ".
            "style-src 'self' 'unsafe-inline' https:; ".
            "img-src 'self' data: blob: https:; ".
            "font-src 'self' data: https:; ".
            "connect-src 'self' ws: wss: https:; ".
            "frame-src 'self'; ".
            "media-src 'self'"
        );
        
        return $response;
    }
}