<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Παίρνουμε τη γλώσσα από το session ή το default app.locale
        $locale = Session::get('locale', config('app.locale'));

        // Ορίζουμε το locale
        App::setLocale($locale);

        return $next($request);
    }
}
