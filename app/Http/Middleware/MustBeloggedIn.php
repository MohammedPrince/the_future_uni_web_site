<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustBeloggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->check()){

             view()->share('userType', 'User');
            return $next($request);
            
        }
        return redirect('/')->with('failure', 'You must be logged in to access this page.');
    }
}
