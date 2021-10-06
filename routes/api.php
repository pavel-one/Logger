<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');

});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user'])->name('get.user');

    Route::post('project', [ProjectController::class, 'create'])
        ->name('create.project');

    Route::prefix('{project}')->group(function () {
        Route::post('log', [LogController::class, 'create'])
            ->name('create.log');
    });

});
