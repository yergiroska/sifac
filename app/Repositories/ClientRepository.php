<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    public function getAll(): iterable
    {
        return Client::all();
    }

    public function findById(int $id): ?Client
    {
        return Client::find($id);
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $client = Client::find($id);
        if (!$client) {
            return false;
        }

        return $client->update($data);
    }

    public function delete(int $id): bool
    {
        $client = Client::find($id);
        if (!$client) {
            return false;
        }

        return $client->delete();
    }
}

