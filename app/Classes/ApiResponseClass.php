<?php

namespace App\Classes;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiResponseClass
{
    /**
     * TODO: Add description and parameters for this method
     */
    public static function rollback($e, $message = "Something went wrong! Process not completed"): void
    {
        DB::rollBack();
        self::throw($e, $message);
    }

    /**
     * TODO: Add description and parameters for this method
     */
    public static function throw($e, $message = "Something went wrong! Process not completed")
    {
        Log::info($e);
        throw new HttpResponseException(response()->json(["message" => $message], 500));
    }

    /**
     * TODO: Add description and parameters for this method
     */
    public static function sendResponse($result, $message, $success = true, $code = 200): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => $success,
            'message' => $message ?? null,
            'data' => $result
        ];

        return response()->json($response, $code);
    }
}
