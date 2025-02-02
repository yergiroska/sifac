<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\AuthService;
use App\Services\Contracts\RegisterServiceInterface;
use App\Services\RegisterService;
use App\Services\Contracts\LoginServiceInterface;
use App\Services\LoginService;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\ClientRepository;
use App\Services\Contracts\ClientServiceInterface;
use App\Services\ClientService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
