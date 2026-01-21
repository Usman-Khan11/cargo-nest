<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message = '', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $result
        ], $code);
    }

    public function sendError($error, $code = 404, $data = [])
    {
        return response()->json([
            'success' => false,
            'message' => $error,
            'data'    => $data
        ], $code);
    }

    public function sendSuccess($message, $result = [])
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $result
        ], 200);
    }
}
