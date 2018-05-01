<?php

namespace App\Http\Middleware;

use Closure;

class CheckManager
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
        if(auth()->check()){//checks if the user is logged-in
            if (!auth()->user()->is_manager){//and is a manager
                return redirect('/permission/manager');
            }
        }
        else
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
