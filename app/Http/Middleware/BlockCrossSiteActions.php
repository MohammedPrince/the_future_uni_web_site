<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Some admin actions (delete, change status) are plain links. Without this, a
 * link on another site could trigger them for an admin who is logged in.
 * They now only work when clicked from inside this site.
 */
class BlockCrossSiteActions
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('GET') && $request->is('*/delete', '*/status/*')) {
            $site = $request->headers->get('Sec-Fetch-Site');
            $sameOrigin = $site !== null
                ? $site === 'same-origin'
                : parse_url((string) $request->headers->get('referer'), PHP_URL_HOST) === $request->getHost();

            if (!$sameOrigin) {
                abort(403, 'Open this action from the admin panel.');
            }
        }

        return $next($request);
    }
}
