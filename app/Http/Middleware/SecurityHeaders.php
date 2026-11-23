<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/** Adds browser security headers to every page Laravel sends. */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $headers = $response->headers;

        $headers->set('X-Content-Type-Options', 'nosniff');
        $headers->set('X-Frame-Options', 'SAMEORIGIN');
        $headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        $headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');

        if ($request->isSecure()) {
            $headers->set('Strict-Transport-Security', 'max-age=31536000');
        }

        $base = "base-uri 'self'; object-src 'none'; frame-ancestors 'self'; form-action 'self'";
        $public = "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; "
            . "img-src 'self' data: https:; font-src 'self' data:; connect-src 'self'; ";

        // Public pages load everything from this site. The admin area still uses CDNs.
        $route = $request->route();
        $isPublic = $route && in_array('page.cache', (array) $route->middleware(), true);
        $headers->set('Content-Security-Policy', ($isPublic ? $public : '') . $base);

        if (!$isPublic) {
            $headers->set('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
