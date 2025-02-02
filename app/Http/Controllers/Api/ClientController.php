<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ClientServiceInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private ClientServiceInterface $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        return response()->json($this->clientService->getAllClients());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        $client = $this->clientService->createClient($validated);

        return response()->json($client, 201);
    }

    public function show(int $id)
    {
        $client = $this->clientService->getClientById($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($client);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        $updated = $this->clientService->updateClient($id, $validated);

        if (!$updated) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json(['message' => 'Cliente actualizado con éxito']);
    }

    public function destroy(int $id)
    {
        $deleted = $this->clientService->deleteClient($id);

        if (!$deleted) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json(['message' => 'Cliente eliminado con éxito']);
    }
}
