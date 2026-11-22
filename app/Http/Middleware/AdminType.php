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

            // SECURITY: a disabled account (del = 1) loses access immediately,
            // even if it still has a session open.
            if ($user && $user->isAdmin == '1' && (int) $user->del === 0) {

                $request->attributes->add(['userType' => 'Admin']);

                view()->share('userType', 'Admin');
                $response = $next($request);

                // Changes made here must show on the public pages at once.
                if (!$request->isMethod('GET') || $request->is('*/delete', '*/status/*', 'clear')) {
                    PageCache::clear();
                }

                return $response;

            }

        return abort(403, 'Unauthorized');
    }
}
