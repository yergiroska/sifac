<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Services\Contracts\ClientServiceInterface;

class ClientService implements ClientServiceInterface
{
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getAllClients(): iterable
    {
        return $this->clientRepository->getAll();
    }

    public function getClientById(int $id): ?Client
    {
        return $this->clientRepository->findById($id);
    }

    public function createClient(array $data): Client
    {
        return $this->clientRepository->create($data);
    }

    public function updateClient(int $id, array $data): bool
    {
        return $this->clientRepository->update($id, $data);
    }

    public function deleteClient(int $id): bool
    {
        return $this->clientRepository->delete($id);
    }
}

