<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Response;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        $token = $user->createToken(User::TOKEN_API_NAME);
        return Response::json([
            'user' => UserResource::make($user),
            'token' => TokenResource::make($token)
        ]);
    }

    public function user(): UserResource
    {
        return UserResource::make(\Auth::user());
    }
}
