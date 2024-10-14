<?php

namespace App\Classes;

use App\Models\Telemetry;
use App\Models\User;

class TelemetryClass
{
    public static function logTelemetry(string $eventName, array $eventData, string | null $userLocation, string | null $ipAddress, int $userId)
    {
        Telemetry::create([
            'event_name' => $eventName,
            'event_data' => json_encode($eventData),
            'user_location' => $userLocation,
            'ip_address' => $ipAddress,
            'user_id' => $userId,
        ]);

        return true;
    }
}
