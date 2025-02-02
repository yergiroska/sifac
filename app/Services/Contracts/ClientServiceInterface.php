<?php

namespace App\Services\Contracts;

use App\Models\Client;

interface ClientServiceInterface
{
    public function getAllClients(): iterable;

    public function getClientById(int $id): ?Client;

    public function createClient(array $data): Client;

    public function updateClient(int $id, array $data): bool;

    public function deleteClient(int $id): bool;
}

