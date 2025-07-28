<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Fetch current language
     * 
     * @param Request $request
     * @param Closure $next
     * 
     * @return [type]
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->header('Accept-Language', config('app.locale'));

        App::setLocale($locale);

        return $next($request);
    }
}

