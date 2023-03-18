<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:3000');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('Access-Control-Allow-Headers', "Content-Type, X-XSRF-TOKEN, X-Requested-With");
        $response->headers->set('Accept', 'application/json');

        return $response;
//        return $next($request)
//            ->headers->set('Access-Control-Allow-Origin', env('APP_URL'))
//            ->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//            ->headers->set('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Requested-With')
//            ->headers->set('Access-Control-Allow-Credentials', 'true');
    }
}
