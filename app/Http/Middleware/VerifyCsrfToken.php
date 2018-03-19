<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //Csrf:Disable Route
    ];

    public function handle($request, Closure $next)
    {
        //OPEN CSRF
        //return parent::handle($request, $next);

        //CLOSE CSRF
        //return $next($request);

        //OPEN CSRF(USE COOKIE)
        return parent::addCookieToResponse($request, $next($request));
    }
}
