<?php

namespace App\Http\Controllers\Web;

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

    // Muestra el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login'); // Carga la vista del formulario
    }

    // Procesa el inicio de sesión
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = $this->loginService->login($validated);

        if (!$user) {
            return redirect()->route('login.form')
                ->withErrors(['email' => 'Credenciales inválidas'])
                ->withInput();
        }

        // Iniciar sesión y redirigir al dashboard
        Auth::login($user);
        return redirect('/dashboard')->with('success', '¡Bienvenido, ' . $user->name . '!');
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente.');
    }
}

