<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ], 200);
    }

    public function sendError($error, $code = 404, $data = [])
    {
        return response()->json([
            'success' => false,
            'message' => $error,
            'data'    => $data,
        ], $code);
    }

    public function sendSuccess($message)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }
}
