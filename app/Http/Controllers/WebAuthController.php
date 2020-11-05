<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebAuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['status' => 1, 'message' => 'invalid credentials'], 401);
        }

        return response()->json(['status' => 0, 'token' => $token]);
    }

    public function getUserData()
    {
        if (is_null(auth()->user())) {
            return response()->json([
                'code' => -1,
                'msg' => 'no login'
            ], 401);
        }

        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 0]);
    }
}
