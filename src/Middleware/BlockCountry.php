<?php

namespace Avcodewizard\BlockByCountry\Middleware;

use Closure;
use GeoIP;
use Illuminate\Support\Facades\Http;

class BlockCountry
{
    public function handle($request, Closure $next)
    {
        $country = @$this->getLocationInfo($request->ip())['data']['country']??null;
        $country = @$this->getLocationInfo('49.36.212.0')['data']['country']??null;
        $blockedCountries = config('blockbycountry.blocked_countries');

        if (in_array($country, $blockedCountries)) {
            abort(403, 'Access blocked for your country.');
        }

        return $next($request);
    }

    public function getLocationInfo($ip){
        try {
            $response = Http::get("http://ipinfo.io/$ip/json");
            if ($response->successful()) {
                return $location = [
                    'status' => 'success', 
                    'data' => $response->json()
                ];
            } else {
                return $location = [
                    'status' => 'error',
                    'message' => 'Unable to retrieve location data.',
                ];
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
