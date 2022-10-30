<?php

namespace App\Helpers;

class ResponseJson
{
  public static function successWithToken($type = 'success', $message = '', $data = null, $token = '', $statusCode = 200)
  {
    return response()->json(compact('type', 'message', 'data', 'token'), $statusCode);
  }

  public static function success($type = 'success', $message = '', $data = null, $statusCode = 200)
  {
    return response()->json(compact('type', 'message', 'data'), $statusCode);
  }

  public static function error($type = 'error', $message = '', $error = null, $statusCode = 401)
  {
    return response()->json(compact('type', 'message', 'error'), $statusCode);
  }
}
