<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('social')->group(function () {
    Route::get('github', [AuthController::class, 'githubAuth'])
        ->name('github.auth');
    Route::get('github-callback', [AuthController::class, 'githubCallback'])
        ->name('github.callback');

    Route::get('yandex', [AuthController::class, 'yandexAuth'])
        ->name('yandex.auth');
    Route::get('yandex-callback', [AuthController::class, 'yandexCallback'])
        ->name('yandex.callback');

    Route::get('vk', [AuthController::class, 'vkAuth'])
        ->name('vk.auth');
    Route::get('vk-callback', [AuthController::class, 'vkCallback'])
        ->name('vk.callback');

    Route::get('telegram', [AuthController::class, 'telegramAuth'])
        ->name('telegram.auth');
    Route::get('telegram-callback', [AuthController::class, 'telegramCallback'])
        ->name('telegram.callback');
});

Route::get('/{any}', [SiteController::class, 'spa'])->where('any', '^(?!api|social).*$');
