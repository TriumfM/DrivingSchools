<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class ModulePermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        $userId = Auth::user()['id'];

        $user = User::where('id', $userId)->first();

        if($user->role == "admin" ){
            return $next($request);
        }

        if($user->role == 'student' && $role == 'student'){
            return $next($request);
        }

        return response(['errors' => ['general' => [ 'You are not authorized' ]] ], 403);
}

}
