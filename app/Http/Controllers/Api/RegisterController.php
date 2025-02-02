<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\RegisterServiceInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private RegisterServiceInterface $registerService;

    public function __construct(RegisterServiceInterface $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->registerService->register($validated);

        return response()->json(['message' => 'Usuario registrado con éxito', 'user' => $user], 201);
    }
}
