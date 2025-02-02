@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Editar Cliente</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre</label>
                <input type="text" name="name" id="name" class="w-full border px-4 py-2 rounded"
                       value="{{ old('name', $client->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="w-full border px-4 py-2 rounded"
                       value="{{ old('email', $client->email) }}" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-medium">Teléfono</label>
                <input type="text" name="phone" id="phone" class="w-full border px-4 py-2 rounded"
                       value="{{ old('phone', $client->phone) }}">
            </div>

            <div class="mb-4">
                <label for="address" class="block font-medium">Dirección</label>
                <textarea name="address" id="address" class="w-full border px-4 py-2 rounded">{{ old('address', $client->address) }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('clients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

