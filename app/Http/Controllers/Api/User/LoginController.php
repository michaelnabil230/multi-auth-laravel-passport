<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required'],
        ]);

        $user = User::firstWhere('email', $request->email);

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $tokenResult = $user->createToken('Personal Access Token');

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => $tokenResult->token->expires_at,
            'user' => $user,
        ]);
    }
}
