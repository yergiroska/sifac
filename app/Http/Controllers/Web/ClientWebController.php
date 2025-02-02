<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientWebController extends Controller
{
    // Muestra la lista de clientes
    public function index()
    {
        $clients = Client::paginate(10); // Paginación
        return view('clients.index', compact('clients'));
    }

    // Muestra el formulario para crear un cliente
    public function create()
    {
        return view('clients.create');
    }

    // Guarda un nuevo cliente en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente creado con éxito.');
    }

    // Muestra el formulario para editar un cliente
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Actualiza un cliente existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado con éxito.');
    }

    // Elimina un cliente
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado con éxito.');
    }
}

