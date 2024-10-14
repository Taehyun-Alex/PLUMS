<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Classes\TelemetryClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\TelemetryRequest;
use Illuminate\Http\Request;

class TelemetryController extends Controller
{
    public function log(TelemetryRequest $request) {
        $user = auth('sanctum')->user();
        $ip = $request->ip();
        $validated = $request->validated();

        $eventName = $validated['event_name'];
        $eventData = $validated['event_data'];
        $userLocation = $validated['user_location'];

        $logged = TelemetryClass::logTelemetry($eventName, $eventData, $userLocation, $ip, $user->id);

        if ($logged) {
            return ApiResponseClass::sendResponse([], 'Success');
        } else {
            return ApiResponseClass::sendResponse([], 'Failed', false, 400);
        }
    }
}
