<?php

namespace App\Traits;

trait LocationTrait
{
    public function locationJsonEncoder($request)
    {
        $fromLocation = json_encode([
            'longitude' => $request->from_location_longitude,
            'latitude' => $request->from_location_latitude,
        ]);
        $toLocation = json_encode([
            'longitude' => $request->to_location_longitude,
            'latitude' => $request->to_location_latitude,
        ]);

        return [$fromLocation, $toLocation];
    }
}
