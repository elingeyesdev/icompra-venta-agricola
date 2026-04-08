<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestión de Roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- 🔍 Buscador -->
                <form method="GET" action="{{ route('roles.index') }}" class="mb-4 flex gap-2">
                    <input type="text" name="buscar" value="{{ $buscar ?? '' }}"
                        placeholder="Buscar rol..."
                        class="border rounded px-3 py-2 w-full">

                    <button class="bg-blue-500 text-white px-4 py-2 rounded">
                        Buscar
                    </button>

                    <a href="{{ route('roles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                        Limpiar
                    </a>
                </form>

                <!-- ➕ Botón crear -->
                <div class="mb-4">
                    <a href="{{ route('roles.create') }}"
                        class="bg-green-500 text-white px-4 py-2 rounded">
                        + Crear Rol
                    </a>
                </div>

                <!-- ✅ Mensaje -->
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- 📋 Tabla -->
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 border">ID</th>
                            <th class="p-2 border">Nombre</th>
                            <th class="p-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td class="p-2 border">{{ $role->id }}</td>
                            <td class="p-2 border">{{ $role->name }}</td>
                            <td class="p-2 border flex gap-2">

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
</x-app-layout>