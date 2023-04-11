<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class LocationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::get('location_saved')) {
            $ip = $request->ip();
            $locationInfo = Location::get($ip);
            if($locationInfo) {
                $data = [
                    'ip' => $locationInfo->ip == "" ? null : $locationInfo->ip,
                    'countryName' => $locationInfo->countryName == "" ? null : $locationInfo->countryName,
                    'countryCode' => $locationInfo->countryCode == "" ? null : $locationInfo->countryCode,
                    'regionCode' => $locationInfo->regionCode == "" ? null : $locationInfo->regionCode,
                    'regionName' => $locationInfo->regionName == "" ? null : $locationInfo->regionName,
                    'cityName' => $locationInfo->cityName == "" ? null : $locationInfo->cityName,
                    'zipCode' => $locationInfo->zipCode == "" ? null : $locationInfo->zipCode,
                    'isoCode' => $locationInfo->isoCode == "" ? null : $locationInfo->isoCode,
                    'postalCode' => $locationInfo->postalCode == "" ? null : $locationInfo->postalCode,
                    'latitude' => $locationInfo->latitude == "" ? null : $locationInfo->latitude,
                    'longitude' => $locationInfo->longitude == "" ? null : $locationInfo->longitude,
                    'metroCode' => $locationInfo->metroCode == "" ? null : $locationInfo->metroCode,
                    'areaCode' => $locationInfo->areaCode == "" ? null : $locationInfo->areaCode,
                    'timezone' => $locationInfo->timezone == "" ? null : $locationInfo->timezone,
                ];
                $visit = new Visit($data);
                $isSaved = $visit->save();
                if($isSaved) Session::put('location_saved', true);
            }
        }
        return $next($request);
    }
}
