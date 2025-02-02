<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard()
    {
        // Obtiene al usuario autenticado
        $user = Auth::user();

        // Carga la vista del dashboard
        return view('dashboard.dashboard', compact('user'));
    }
}
