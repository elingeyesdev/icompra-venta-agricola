@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 p-6 rounded-lg">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-xl font-semibold">Compras</h2>

                <a href="{{ route('compras.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors">
                    + Nueva Compra
                </a>
            </div>

            <div class="overflow-hidden rounded-md shadow-sm">
                <table class="w-full bg-white">

                    <thead class="bg-green-300">
                        <tr>
                            <th class="p-3 text-left text-green-900">ID</th>
                            <th class="p-3 text-left text-green-900">Proveedor</th>
                            <th class="p-3 text-center text-green-900">Fecha</th>
                            <th class="p-3 text-center text-green-900">Total</th>
                            <th class="p-3 text-center text-green-900">Estado</th>
                            <th class="p-3 text-center text-green-900">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($compras as $compra)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="p-3 text-gray-700">#{{ $compra->id }}</td>

                            <td class="p-3 font-medium text-gray-900">
                                {{ $compra->proveedore?->nombre ?? 'Sin proveedor' }}
                            </td>

                            <td class="p-3 text-center text-gray-600">{{ $compra->fecha_compra }}</td>

                            <td class="p-3 text-center font-bold text-gray-800">{{ $compra->total_compra }}</td>

                            <td class="p-3 text-center">
                                <span class="px-3 py-1 text-xs text-white rounded font-bold uppercase
                                    {{ $compra->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $compra->estado == 1 ? 'Completada' : 'Pendiente' }}
                                </span>
                            </td>

                            <td class="p-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('compras.show', $compra->id) }}"
                                        class="bg-blue-400 hover:bg-blue-500 px-2 py-1 rounded text-white text-sm">
                                        Ver
                                    </a>

                                    <a href="{{ route('compras.edit', $compra->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 px-2 py-1 rounded text-sm text-gray-900">
                                        Editar
                                    </a>

                                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" onsubmit="return confirm('¿Eliminar compra?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
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