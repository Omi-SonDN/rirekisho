<?php

namespace App\Http\Middleware;

use Closure;

class VisitorMiddleware
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

        if ($request->user()->getRole() == "Applicant") {
            abort(403);
//            return response('Access denied ', 404);
        }
        return $next($request);
    }
}
