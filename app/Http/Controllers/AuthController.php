<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function register(CreateUserRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        $token = $user->createToken(User::TOKEN_API_NAME);
        return Response::json([
            'user' => UserResource::make($user),
            'token' => TokenResource::make($token)
        ], 201);
    }

    public function user(): UserResource
    {
        return UserResource::make(\Auth::user());
    }

    public function githubAuth(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback(Request $request): RedirectResponse
    {
        $user = Socialite::driver('github')->user();
        dd($user);
    }
}
