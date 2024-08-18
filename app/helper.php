<?php

if (!function_exists('sendSuccessResponse')) {
    function sendSuccessResponse($message, $data = [], $status = 200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data
        ], $status);
    }
}

if (!function_exists('sendErrorResponse')) {
    function sendErrorResponse($message, $data = [], $status = 500)
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "data" => $data
        ], $status);
    }
}
