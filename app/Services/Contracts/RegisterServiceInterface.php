<?php

namespace App\Services\Contracts;

use App\Models\User;

interface RegisterServiceInterface
{
    public function register(array $data): User;
}
