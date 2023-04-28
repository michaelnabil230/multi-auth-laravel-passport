<?php

use App\Http\Controllers\Api\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/admin-login', LoginController::class);

Route::get('/admin-dashboard', function () {
    return response()->json([
        'massage' => 'Admin dashboard'
    ]);
})->middleware('auth:admin-api');
