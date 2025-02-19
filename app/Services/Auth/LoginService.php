<?php

namespace App\Services;

use App\Models\User;

class LoginService
{
    public function login(array $data)
    {
        if (!$token = auth()->attempt($data)) {
            return false;
        }
        return $token;
    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $token = auth()->login($user);

        return [$user, $token];
    }
}
