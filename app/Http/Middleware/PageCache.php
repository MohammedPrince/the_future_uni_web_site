<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

/**
 * Keeps the finished HTML of public pages for a few minutes, so most visits
 * need no database work. Any admin action clears it (see AdminType).
 */
class PageCache
{
    public static function clear(): void
    {
        rescue(fn () => Cache::store('pages')->flush());
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->cacheable($request)) {
            return $next($request);
        }

        $cache = Cache::store('pages');
        $key = 'page:' . sha1($request->fullUrl());
        // rescue(): a cache problem (e.g. folder permissions) must never break a page.
        $page = rescue(fn () => $cache->get($key));
        $hit = $page !== null;

        if (!$hit) {
            $response = $next($request);
            if (!$response instanceof Response || $response->getStatusCode() !== 200) {
                return $response;
            }
            $body = $response->getContent();
            $page = [
                'body' => $body,
                'type' => $response->headers->get('Content-Type', 'text/html; charset=UTF-8'),
                'gzip' => function_exists('gzencode') ? gzencode($body, 9) : false,
                'etag' => sha1($body),
            ];
            rescue(fn () => $cache->put($key, $page, config('seo.page_cache_seconds')));
        }

        $response = new Response($page['body'], 200, ['Content-Type' => $page['type']]);
        $response->headers->set('Vary', 'Accept-Encoding');

        if (!empty($page['gzip']) && in_array('gzip', $request->getEncodings(), true) && !ini_get('zlib.output_compression')) {
            $response->setContent($page['gzip']);
            $response->headers->set('Content-Encoding', 'gzip');
            $response->headers->set('Content-Length', (string) strlen($page['gzip']));
        }

        $response->headers->set('Cache-Control', 'public, max-age=60, stale-while-revalidate=600');
        $response->headers->set('X-Page-Cache', $hit ? 'hit' : 'miss');
        $response->setEtag($page['etag'] ?? sha1($page['body']), true);
        $response->isNotModified($request);

        return $response;
    }

    private function cacheable(Request $request): bool
    {
        if (!config('seo.page_cache') || !$request->isMethod('GET')) {
            return false;
        }

        // Only known hosts and "?page=N", so nobody can fill the cache with junk.
        if (!in_array($request->getHost(), config('seo.hosts'), true)) {
            return false;
        }

        $query = $request->query();

        return $query === [] || (array_keys($query) === ['page'] && is_string($query['page'])
            && preg_match('/^[1-9]\d{0,2}$/', $query['page']) === 1);
    }
}
