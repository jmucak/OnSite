<?php

namespace App\Http\Middleware;

use Closure;

class CheckForRole
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
        if($request->user() === null){
            return abort(403);
        }

        if($request->user()->hasRole($role)) {
            
            return $next($request); 
        }

        return abort(401);
        
    }
}
