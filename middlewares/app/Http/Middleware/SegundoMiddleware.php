<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class SegundoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Passou pelo SegundoMiddleware ANTES');
        $response = $next($request);
        Log::debug('Passou pelo SegundoMiddleware DEPOIS');
        return $response;
    }
}
