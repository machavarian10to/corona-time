<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetLocalLanguage
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        $lang = session('lang', 'en');
        app()->setLocale($lang);
        return $next($request);
    }
}
