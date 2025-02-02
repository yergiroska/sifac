<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\LoginServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private LoginServiceInterface $loginService;

    public function __construct(LoginServiceInterface $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        // Validar las credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verificar las credenciales
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Generar el token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar el token en la respuesta
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    /*public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $token = $this->loginService->login($credentials);

        if (!$token) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }*/
}
