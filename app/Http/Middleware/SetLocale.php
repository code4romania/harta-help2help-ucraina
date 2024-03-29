<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if (! app('languages')->has($locale)) {
            return redirect()->to(
                collect($request->segments())
                    ->prepend('ro')
                    ->implode('/')
            );
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
