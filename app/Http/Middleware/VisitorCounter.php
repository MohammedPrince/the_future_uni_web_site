<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class VisitorCounter
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
        $filePath = storage_path('app/public/visitor_count.txt');

        // Read the current count
        $count = (int) file_get_contents($filePath);

        // Increment the count
        $count++;

        // Update the count in the file
        file_put_contents($filePath, $count);

        return $next($request);
    }
}
