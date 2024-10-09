<?php

namespace App\Http\Middleware;

use Closure;
use Stevebauman\Location\Facades\Location;

class GeolocationMiddleware
{
    public function handle($request, Closure $next)
    {
        $position = Location::get(); // Dapatkan lokasi pengguna
        if ($position) {
            $request->merge(['location' => $position]);
        }
        return $next($request);
    }
}

