@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 p-6 rounded-lg shadow-lg">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-white text-2xl font-semibold">Listado de Productos</h2>

                <a href="{{ route('productos.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition font-medium">
                     Nuevo Producto
                </a>
            </div>

            <form action="{{ route('productos.index') }}" method="GET" class="mb-4 flex gap-2">

    <input type="text" name="buscar"
        value="{{ request('buscar') }}"
        placeholder="Buscar producto, categoría, precio..."
        class="w-full px-3 py-2 rounded border">

    <button type="submit"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
        Buscar
    </button>

    @if(request('buscar'))
        <a href="{{ route('productos.index') }}"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Limpiar
        </a>
    @endif

</form>

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full text-left">

                    <thead class="bg-[#99f6b4] text-black border-b border-gray-300">
                        <tr>
                            <th class="p-3 font-bold text-sm">ID</th>
                            <th class="p-3 font-bold text-sm">Categoría</th>
                            <th class="p-3 font-bold text-sm">Nombre</th>
                            <th class="p-3 font-bold text-sm text-center">Stock</th>
                            <th class="p-3 font-bold text-sm text-center">Precio</th>
                            <th class="p-3 font-bold text-sm text-center">Estado</th>
                            <th class="p-3 font-bold text-sm text-right">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($productos as $producto)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 text-sm text-gray-700">{{ $producto->id }}</td>
                            <td class="p-3 text-sm text-gray-700">
                                <span class="bg-gray-100 px-2 py-1 rounded text-xs">
                                    {{ $producto->categoria?->nombre ?? 'Sin categoría' }}
                                </span>
                            </td>
                            <td class="p-3 text-sm font-medium text-gray-900">{{ $producto->nombre }}</td>
                            
                            <td class="p-3 text-sm text-center font-semibold text-gray-700">
                                {{ $producto->stock }} 
                                
                            </td>

                            <td class="p-3 text-sm text-center text-gray-900 font-bold">
                                ${{ number_format($producto->precio, 2) }}
                            </td>

                            <td class="p-3 text-center">
                                <span class="px-3 py-1 text-white rounded-full text-xs font-bold
                                    {{ $producto->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>

                            <td class="p-3 flex justify-end gap-2">
                                <a href="{{ route('productos.show', $producto->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white text-xs transition">Ver</a>

                                <a href="{{ route('productos.edit', $producto->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-xs transition">Editar</a>

                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs transition" 
                                            onclick="return confirm('¿Eliminar producto?')">
                                        Borrar
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
</div>

@endsection