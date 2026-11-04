<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    private const LOCALES = ['fr', 'en', 'es'];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', config('app.locale'));

        if (! in_array($locale, self::LOCALES, true)) {
            $locale = 'fr';
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);

        // Charge tous les petits fichiers de traduction : lang/<page>/en.json, lang/<page>/es.json
        $loader = app('translation.loader');
        foreach (glob(lang_path('*'), GLOB_ONLYDIR) ?: [] as $dossier) {
            $loader->addJsonPath($dossier);
        }

        return $next($request);
    }
}