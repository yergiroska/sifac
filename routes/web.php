<?php

use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\ClientWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/clients', [ClientWebController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientWebController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientWebController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [ClientWebController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientWebController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientWebController::class, 'destroy'])->name('clients.destroy');
});

/*Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');*/
