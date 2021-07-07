<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
        ->header("Access-Control-Allowed-Origins","*")
        ->header("Access-Control-Allowed-Methods","GET,POST,PUT,DELETE,PATCH, OPTIONS")
        ->header("Access-Control-Allowed-Headers","*");
    }
}
