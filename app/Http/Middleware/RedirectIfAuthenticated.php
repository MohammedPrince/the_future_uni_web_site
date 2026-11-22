<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Already logged in: send staff to the admin area, not the public homepage.
                $user = Auth::guard($guard)->user();
                if ((int) $user->del === 0) {
                    return redirect($user->isAdmin == 1 ? '/add_user' : '/add_event');
                }
                // Disabled account with a leftover session: log it out.
                Auth::guard($guard)->logout();
                return redirect('/admin_panel');
            }
        }

        return $next($request);
    }
}
