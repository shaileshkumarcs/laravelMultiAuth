<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if(!$request->user()->hasRole($role)) {

             // abort(404);
            return redirect('/unauthorised');

        }

        if($permission !== null && !$request->user()->can($permission)) {

              // abort(404);
            return redirect('/unauthorised');
        }

        return $next($request);

    }
}
