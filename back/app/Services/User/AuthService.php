<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Promoter;
use App\Models\Agency;
use Illuminate\Support\Facades\Hash;

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

    public static function register(array $data)
    {
        $userData = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'contact' => $data['contact'],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $user = User::create($userData);

        switch ($data['role']) {
            case 'visitor':
                Visitor::create([
                    'user_id' => $user->id, 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]);
                break;

            case 'promoter':
                Promoter::create([
                    'user_id' => $user->id, 
                    'created_at' => now(), 
                    'updated_at' => now()
                ]);
                break;

            case 'agency':
                Agency::create([
                    'user_id' => $user->id,
                    'company_name' => $data['company_name'],
                    'nif' => $data['nif'],
                    'stat' => $data['stat'],
                    'responsible_name' => $data['responsible_name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                break;
        }

        Auth::login($user);

        return [
            'token' => $user->createToken('auth_token')->plainTextToken,
            'user' => $user,
        ];
    }
}