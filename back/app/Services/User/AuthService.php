<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Login for user
     * @param array $credentials
     * 
     * @return array|null
     */
    public static function login(array $credentials): ?array
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return [
                'token' => $user->createToken('auth_token')->plainTextToken,
                'user' => $user,
            ];
        }

        return null;
    }
}