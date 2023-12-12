<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminType
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
        $user = $request->user();

           // dd($user);

            if ($user && $user->isAdmin == '1') {

                $request->attributes->add(['userType' => 'Admin']);

                view()->share('userType', 'Admin');
                return $next($request);

            }

        return abort(403, 'Unauthorized');
    }
}
