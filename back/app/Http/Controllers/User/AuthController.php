<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Services\User\AuthService;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created user & role table in storage.
     * @param RegisterRequest $request
     * 
     * @return [type]
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = AuthService::register($data);

        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => __('auth.registered_success'), 
            'user' => $user
        ], 201);
    }

    /**
     * Check login user
     * 
     * @param LoginRequest $request
     * 
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $result = AuthService::login($request->only(['email', 'password']));

        if (!$result) {
            return response()->json([
                'message' => __('auth.login_failed'),
            ], 401);
        }

        return response()->json([
            'token' => $result['token'],
            'user' => new UserResource($result['user']),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
