@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-xl font-semibold">
                    Proveedores
                </h2>

                <a href="{{ route('proveedores.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                     Nuevo Proveedor
                </a>
            </div>

            <form action="{{ route('proveedores.index') }}" method="GET" class="mb-4 flex gap-2">
    
    <input type="text" name="buscar"
        value="{{ request('buscar') }}"
        class="w-full px-3 py-2 rounded border">

    <button type="submit"
        class="bg-yellow-500 text-white px-4 py-2 rounded">
        Buscar
    </button>
    <a href="{{ route('proveedores.index') }}" class="bg-red-500 text-white px-4 py-2 rounded">
                    Limpiar
                </a>
    

</form>

            <!-- MENSAJE -->
            @if ($message = Session::get('success'))
                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                    {{ $message }}
                </div>
            @endif

            <!-- TABLA -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr class="bg-green-300">
                            <th class="p-2 border">No</th>
                            <th class="p-2 border">Nombre</th>
                            <th class="p-2 border">Correo</th>
                            <th class="p-2 border">Teléfono</th>
                            <th class="p-2 border">Dirección</th>
                            <th class="p-2 border">Razón Social</th>
                            <th class="p-2 border">Estado</th>
                            <th class="p-2 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($proveedores as $proveedor)
                            <tr class="border-b">

                                <td class="p-2 border">{{ ++$i }}</td>
                                <td class="p-2 border">{{ $proveedor->nombre }}</td>
                                <td class="p-2 border">{{ $proveedor->correo }}</td>
                                <td class="p-2 border">{{ $proveedor->telefono }}</td>
                                <td class="p-2 border">{{ $proveedor->direccion }}</td>
                                <td class="p-2 border">{{ $proveedor->razon_social }}</td>
                                <td class="p-2 border">{{ $proveedor->estado }}</td>

                                <td class="p-2 border flex gap-2">

                                    <a href="{{ route('proveedores.show', $proveedor->id) }}"
                                        class="bg-blue-400 text-white px-3 py-1 rounded">
                                         ver
                                    </a>

                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                        class="bg-yellow-400 text-white px-3 py-1 rounded">
                                        Editar
                                    </a>

                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('¿Eliminar proveedor?')">
                                            Eliminar
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- PAGINACIÓN -->
            <div class="mt-4 text-white">
                {!! $proveedores->withQueryString()->links() !!}
            </div>

        </div>

    </div>
</div>

@endsection