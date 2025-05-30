<?php

namespace App\Http\Middleware;

use Phaseolies\Support\Facades\Auth;
use Phaseolies\Middleware\Contracts\Middleware;
use Phaseolies\Http\Response;
use Phaseolies\Http\Request;
use Closure;

class Authenticate implements Middleware
{
    /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param \Closure(\Phaseolies\Http\Request) $next
     * @return Phaseolies\Http\Response
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
