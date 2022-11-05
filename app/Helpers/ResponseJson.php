<?php

namespace App\Helpers;

// Class Helper
class ResponseJson
{
  public static function successWithToken($message = '', $data = null, $token = '', $tokenType = 'Bearer', $statusCode = 200)
  {
    return response()->json([
      'type' => 'success',
      'message' => $message,
      'data' => $data,
      'access_token' => $token,
      'token_type' => $tokenType
    ], $statusCode);
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
