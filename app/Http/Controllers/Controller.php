<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function respondWithSuccess($message = '', $data = [], $code = 200)
    {
        return response()->json([
            'status'   => true,
            'errors'  => false,
            'message'  => $message,
            'data'     => $data
        ], $code);
    }
    protected function respondWithError($message, $data = [], $code = 203)
    {
        return response()->json([
            'status'   => false,
            'errors'  => true,
            'message'  => $message,
            'data'     => $data
        ], $code);
    }

    // set cookie
    // 86400 = 1 day
    protected function setCookie()
    {
        $cookie_name = "user";
        $cookie_value = "John Doe";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
    protected function getCookie(Request $request, $name)
    {
        $value = $request->cookie($name);
        return $value;
    }
}
