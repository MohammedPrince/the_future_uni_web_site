<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VisitorCounter
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /** Runs after the page has been sent, so counting never slows a visit. */
    public function terminate(Request $request, $response)
    {
        if (!$request->isMethod('GET') || !$request->is('/')) {
            return;
        }

        try {
            // Each address needs the database at most once a day.
            if (Cache::store('pages')->add('visitor:' . sha1((string) $request->ip()), 1, 86400)) {
                (new VisitorController())->user_log($request);
            }
        } catch (\Throwable $e) {
            report($e);
        }
    }
}
