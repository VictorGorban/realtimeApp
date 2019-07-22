<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param Closure                   $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // wow, it throws an Exception. Ok, I'll will handle it.
        JWTAuth::parseToken()->authenticate();
        // if can be parsed then parse it, auth, then call next
        return $next($request);
    }
}
