<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserSocial;
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
        return Socialite::driver(UserSocial::GITHUB_PROVIDER)->redirect();
    }

    public function githubCallback(Request $request): UserResource
    {
        try {
            $socialUser = Socialite::driver(UserSocial::GITHUB_PROVIDER)->user();
        } catch (\Exception $e) {
            abort(404);
        }

        if (!$socialUser) {
            abort(404);
        }

        return UserResource::make(User::createWithSocial($socialUser, UserSocial::GITHUB_PROVIDER));
    }

    public function yandexAuth(): RedirectResponse
    {
        return Socialite::driver(UserSocial::YANDEX_PROVIDER)->redirect();
    }

    public function yandexCallback(): UserResource
    {
        try {
            $socialUser = Socialite::driver(UserSocial::YANDEX_PROVIDER)->user();
        } catch (\Exception $e) {
            abort(404);
        }

        if (!$socialUser) {
            abort(404);
        }

        return UserResource::make(User::createWithSocial($socialUser, UserSocial::YANDEX_PROVIDER));
    }

    public function vkAuth(): RedirectResponse
    {
        return Socialite::driver(UserSocial::VK_PROVIDER)->redirect();
    }

    public function vkCallback(): UserResource
    {
        try {
            $socialUser = Socialite::driver(UserSocial::VK_PROVIDER)->user();
        } catch (\Exception $e) {
            abort(404);
        }

        if (!$socialUser) {
            abort(404);
        }

        return UserResource::make(User::createWithSocial($socialUser, UserSocial::VK_PROVIDER));
    }

    public function telegramAuth()
    {
        return Socialite::driver(UserSocial::TELEGRAM_PROVIDER)->redirect();
    }

    public function telegramCallback(): UserResource
    {
        try {
            $socialUser = Socialite::driver(UserSocial::TELEGRAM_PROVIDER)->user();
        } catch (\Exception $e) {
            abort(404);
        }

        if (!$socialUser) {
            abort(404);
        }

        return UserResource::make(User::createWithSocial($socialUser, UserSocial::TELEGRAM_PROVIDER));
    }
}
