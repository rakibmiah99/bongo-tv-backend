<?php

namespace App;

class ApiObject
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function errorResponse($message, $errors = [] , $status_code = 500){
        $packet['result'] = false;
        $packet['message'] = $message;
        if ($errors){
            $packet['errors'] = $errors;
        }
        return response()->json($packet, $status_code);
    }

    public function sendResponse(?int $statusCode, ?string $message, mixed $data = null){
        $response['message']= $message ?? "success";
        if ($data){
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode ?? 200);
    }

    public function adminResponse(?string $message, mixed $data = [], ?int $statusCode = 200){
        $response['message']= $message ?? "success";
        if ($data){
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode ?? 200);
    }
}
