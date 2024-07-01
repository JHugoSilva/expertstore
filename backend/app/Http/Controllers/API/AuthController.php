<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            abort(401, 'Invalid Credentials');
        }
        $request->user()->tokens()->delete();
        $token = $request->user()->createToken('default');
        return response()->json([
            'data' => [
                'token' => $token->plainTextToken
            ]
        ], Response::HTTP_OK);
    }

    public function logout(Request $request) {

        $request->user()->tokens()->delete();

        return response()->noContent();
    }
}
