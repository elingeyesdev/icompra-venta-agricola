@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 p-6 rounded-lg shadow-xl">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-white text-2xl font-bold italic">Gestión de Usuarios</h2>
                <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl transition">
                     Nuevo Usuario
                </a>
            </div>

            <form action="{{ route('users.index') }}" method="GET" class="mb-4 flex gap-2">
    
    <input type="text" name="buscar"
        value="{{ request('buscar') }}"
        class="w-full px-3 py-2 rounded border">

    <button type="submit"
        class="bg-yellow-500 text-white px-4 py-2 rounded">
        Buscar
    </button>
    <a href="{{ route('users.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">
                    Limpiar
                </a>

</form>

            <div class="overflow-hidden rounded-xl">
                <table class="w-full bg-white text-center">
                    <thead class="bg-green-300 text-green-900">
                        <tr>
                            <th class="p-3">ID</th>
                            <th class="p-3 text-left">Nombre</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Roles</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3">{{ $user->id }}</td>
                            <td class="p-3 text-left font-semibold">{{ $user->name }}</td>
                            <td class="p-3 text-gray-600">{{ $user->email }}</td>
                            <td class="p-3">
                                @foreach($user->roles as $role)
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full font-bold uppercase">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="p-3 flex justify-center gap-2">
                                <a href="{{ route('users.edit-role', $user->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded transition flex items-center gap-1" title="Asignar Rol">
        <i class="fas fa-key text-xs"></i> Rol
    </a>
                                <a href="{{ route('users.show', $user->id) }}"  class="bg-blue-400 text-white px-3 py-1 rounded"> Ver</a>
                                <a href="{{ route('users.edit', $user->id) }}"  class="bg-yellow-400 text-white px-3 py-1 rounded">Editar</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Eliminar usuario?')">
                                    @csrf @method('DELETE')
                                    <button  class="bg-red-600 text-white px-3 py-1 rounded">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection