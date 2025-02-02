<?php

namespace App\Services;

use App\Services\Contracts\LoginServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginService implements LoginServiceInterface
{
    /*public function login(array $credentials): ?string
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        $user = Auth::user();
        return $user->createToken('auth_token')->plainTextToken;
    }*/

    public function login(array $credentials): ?User
    {
        if (!Auth::validate($credentials)) {
            return null;
        }

        return User::where('email', $credentials['email'])->first();
    }
}
