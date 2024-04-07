<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->segment(1), config('app.locales'))) {
            app()->setLocale($request->segment(1));
        }

        // una vez que seteamos el locale lo olvidamos 
        // Esto se hace para evitar que en los controladores y en todas las vistas tengamos como primer parametro el lenguaje
        $request->route()->forgetParameter('locale');

        return $next($request);
    }
}