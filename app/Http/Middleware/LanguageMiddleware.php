<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        // check if a language is set in the session
        if (session()->has('language')) {

            // get the language from the session
            $language = session()->get('language');
        } else {
            // get the browser language
            $language = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        }

        // set language
        app()->setLocale($language);

        return $next($request);
    }
}
