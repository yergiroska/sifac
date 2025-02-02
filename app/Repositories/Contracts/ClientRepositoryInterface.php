<?php

namespace App\Repositories\Contracts;

use App\Models\Client;

interface ClientRepositoryInterface
{
    public function getAll(): iterable;

    public function findById(int $id): ?Client;

    public function create(array $data): Client;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}

