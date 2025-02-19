<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\LoginService;

class LoginController extends Controller
{
    public function __construct(private readonly LoginService $service) {}
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->service->login($credentials);
        if (!$token) {
            return response()->json([
                'error' => 'Invalid credentials'
            ], 401);
        }
        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function register(RegisterRequest $request)
    {
        [$user, $token] = $this->service->register($request->validated());

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
}
