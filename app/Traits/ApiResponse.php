<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($messages, $data, $statusCode = 200)
    {
        return response()->json([
            "messages" => $messages,
            "data" => $data,
            "status" => $statusCode,
        ], $statusCode);
    }

    public function failedResponse($messages, $statusCode)
    {
        return response()->json([
            "messages" => $messages,
            "status" => $statusCode,
        ], $statusCode);
    }
}
