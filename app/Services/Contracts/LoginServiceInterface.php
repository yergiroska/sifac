<?php

namespace App\Services\Contracts;

interface LoginServiceInterface
{
    public function login(array $credentials): ?\App\Models\User;
}
