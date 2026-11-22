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

        if ($hit) {
            $response = new Response($page['body'], 200, ['Content-Type' => $page['type']]);
        } else {
            $response = $next($request);
            if (!$response instanceof Response || $response->getStatusCode() !== 200) {
                return $response;
            }
            rescue(fn () => $cache->put($key, [
                'body' => $response->getContent(),
                'type' => $response->headers->get('Content-Type', 'text/html; charset=UTF-8'),
            ], config('seo.page_cache_seconds')));
        }

        $response->headers->set('Cache-Control', 'public, max-age=60, stale-while-revalidate=600');
        $response->headers->set('X-Page-Cache', $hit ? 'hit' : 'miss');
        $response->setEtag(sha1($response->getContent()), true);
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
