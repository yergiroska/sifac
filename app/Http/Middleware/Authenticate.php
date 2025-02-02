<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Handle unauthenticated users.
     */
    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            // Devuelve respuesta JSON para solicitudes API
            abort(response()->json(['message' => 'No autenticado.'], 401));
        }

        // Redirige al formulario de inicio de sesión para solicitudes web
        redirect()->guest($this->redirectTo($request));
    }

    /**
     * Get the path the user should be redirected to when unauthenticated.
     */
    protected function redirectTo($request)
    {
        // Si es web, redirige a la ruta de login
        if (!$request->expectsJson()) {
            return route('login'); // Asegúrate de que el nombre de la ruta es 'login'
        }
    }
}
