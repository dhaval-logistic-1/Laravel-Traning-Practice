<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {

        // app()->setLocale($request->session()->get('language'));

        // return $next($request);


        $locale = $request->session()->get('language',config('APP_LOCALE'));

        if (App::setLocale($locale)) {
            dd($locale);
        };

        // $locale = $request->session()->get('lang', config('APP_LOCALE'));
        // App::setLocale($locale);
        // dd(App::getLocale());  // Ensure it's being applied

        // 


        // App::setLocale('hi'); // Set to a known valid locale
        // dd(App::getLocale()); // Check if it's set

        return $next($request);
    }
}
