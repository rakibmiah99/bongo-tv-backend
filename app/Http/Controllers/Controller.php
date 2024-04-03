<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function sendResponse(?int $statusCode, ?string $message, mixed $data = null){
        $response['message']= $message ?? "success";
        if ($data){
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode ?? 200);
    }
}
