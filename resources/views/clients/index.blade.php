@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Clientes</h1>
        <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Cliente</a>
        <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Regresar a Inicio</a>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 my-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-4 border">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $client->name }}</td>
                    <td class="px-4 py-2">{{ $client->email }}</td>
                    <td class="px-4 py-2">{{ $client->phone }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $clients->links() }}
        </div>
    </div>
@endsection

