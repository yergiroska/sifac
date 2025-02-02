<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register'); // Carga la vista del formulario de registro
    }

    public function register(Request $request)
    {
        // Validar los datos enviados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Encripta la contraseña
        ]);

        // Redirigir a una página de bienvenida
        return redirect('/login')->with('success', '¡Bienvenido ' . $user->name . '!');

        // Redirigir con un mensaje de éxito
        //return redirect()->route('register.form')->with('success', 'Usuario registrado con éxito.');
    }
}
