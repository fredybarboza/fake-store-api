<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Authenticate a user and return an access token if successful.
     */
    public function login(LoginRequest $request): JsonResponse
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && $user->password === $password) {

            $token = Auth::login($user);

            return response()->json([
                'access_token' => $token,
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }

}
