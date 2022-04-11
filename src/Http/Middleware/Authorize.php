<?php

namespace Scouser03\MultiSelect\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}