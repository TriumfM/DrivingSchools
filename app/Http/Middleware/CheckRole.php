<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = \Auth::user();
        if(!$user)
            return response(['errors' => ['general' => [ 'You are not authorized' ]] ], 403);

        return $next($request);
    }
}
