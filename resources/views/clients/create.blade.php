@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Crear Cliente</h1>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Nombre</label>
                <input type="text" name="name" id="name" class="w-full border px-4 py-2" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="w-full border px-4 py-2" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block">Teléfono</label>
                <input type="text" name="phone" id="phone" class="w-full border px-4 py-2" value="{{ old('phone') }}">
            </div>

            <div class="mb-4">
                <label for="address" class="block">Dirección</label>
                <textarea name="address" id="address" class="w-full border px-4 py-2">{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
@endsection

