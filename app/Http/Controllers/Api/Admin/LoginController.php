<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:admins'],
            'password' => ['required'],
        ]);

        $admin = Admin::firstWhere('email', $request->email);

        if (!Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $tokenResult = $admin->createToken('Personal Access Token');

        return response()->json([
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => $tokenResult->token->expires_at,
            'admin' => $admin,
        ]);
    }
}
