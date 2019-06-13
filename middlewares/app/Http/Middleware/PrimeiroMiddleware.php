<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PrimeiroMiddleware
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
        Log::debug('Passou pelo PrimeiroMiddleware ANTES');
        //return response('parando a cadeia de chamadas');
        //return $next($request);
        $response = $next($request);
        Log::debug('Passou pelo PrimeiroMiddleware DEPOIS');
        //return $response;
        return response('Alterei a resposta', 201);
    }
}
