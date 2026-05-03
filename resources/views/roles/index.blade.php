@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-white text-2xl font-bold">Gestión de Roles</h2>
                <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl transition">
                     Crear rol
                </a>
            </div>

            <!-- Buscador -->
            <form method="GET" action="{{ route('roles.index') }}" class="mb-4 flex gap-2">
                <input type="text" name="buscar" value="{{ $buscar ?? '' }}"
                    class="border rounded px-3 py-2 w-full">

                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Buscar
                </button>

                <a href="{{ route('roles.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">
                    Limpiar
                </a>
            </form>

            <!-- Mensaje -->
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabla -->
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 bg-green-300 border">ID</th>
                        <th class="p-2 bg-green-300 border">Nombre</th>
                        <th class="p-2 bg-green-300 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="p-2 bg-white border">{{ $role->id }}</td>
                            <td class="p-2 bg-white border">{{ $role->name }}</td>
                            <td class="p-2 bg-white border flex gap-2">

                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="bg-yellow-400 px-3 py-1 rounded">
                                    Editar
                                </a>

                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection