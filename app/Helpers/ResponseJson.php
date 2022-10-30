<?php

namespace App\Helpers;

class ResponseJson
{
  public static function successWithToken($message = '', $data = null, $token = '', $statusCode = 200)
  {
    $type = 'success';
    return response()->json(compact('type', 'message', 'data', 'token'), $statusCode);
  }

  public static function success($message = '', $data = null, $statusCode = 200)
  {
    $type = 'success';
    return response()->json(compact('type', 'message', 'data'), $statusCode);
  }

  public static function error($message = '', $error = null, $statusCode = 401)
  {
    $type = 'error';
    return response()->json(compact('type', 'message', 'error'), $statusCode);
  }
}
