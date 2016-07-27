<?php

namespace App\Http\Middleware;

use Closure;

class ApplicantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->user()->getRole() == "Visitor") {

            return response('Access denied ', 404);
        }
        return $next($request);
    }
}
