@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-xl font-semibold">Unidades de Medida</h2>
                <a href="{{ route('unidad-medidas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm transition">
                    {{ __('Crear Nueva') }}
                </a>
            </div>

            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 shadow-sm">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full text-left">
                    <thead class="bg-green-300 text-black border-b border-gray-300">
                        <tr>
                            <th class="px-4 py-3 font-semibold text-sm">No</th>
                            <th class="px-4 py-3 font-semibold text-sm">Nombre</th>
                            <th class="px-4 py-3 font-semibold text-sm">Abreviatura</th>
                            <th class="px-4 py-3 font-semibold text-sm text-center">Estado</th>
                            <th class="px-4 py-3 font-semibold text-sm text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($unidadMedidas as $unidadMedida)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm text-gray-700">{{ ++$i }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $unidadMedida->nombre }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $unidadMedida->abreviatura ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $unidadMedida->estado == 1 ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $unidadMedida->estado == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('unidad-medidas.destroy', $unidadMedida->id) }}" method="POST" class="flex justify-end gap-2">
                                    <a class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs transition" href="{{ route('unidad-medidas.show', $unidadMedida->id) }}">Ver</a>
                                    <a class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs transition" href="{{ route('unidad-medidas.edit', $unidadMedida->id) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs transition" onclick="return confirm('¿Está seguro de eliminar esta unidad?')">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {!! $unidadMedidas->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection