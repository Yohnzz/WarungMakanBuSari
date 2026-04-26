<?php
namespace App\Helper;

use Illuminate\Http\Response;

class ResponseHelpers{
    public static function success ($data, $message = 'Success', $code = Response::HTTP_OK){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public static function error($data = null, $message = 'Error', $code = Response::HTTP_BAD_REQUEST){
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}