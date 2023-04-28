<?php

use App\Http\Controllers\Api\User\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/user-login', LoginController::class);

Route::get('/user-dashboard', function () {
    return response()->json([
        'massage' => 'User dashboard'
    ]);
})->middleware('auth:user-api');
