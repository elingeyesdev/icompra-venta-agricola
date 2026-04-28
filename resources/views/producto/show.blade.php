@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto">

        <div class="bg-green-800 p-6 rounded-lg">

            <div class="flex justify-between mb-4">
                <h2 class="text-white text-xl">Detalle Producto</h2>

                <a href="{{ route('productos.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded">
                    Volver
                </a>
            </div>

            <div class="bg-white p-4 rounded space-y-2">

                <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                <p><strong>Precio:</strong> {{ $producto->precio }}</p>

               <p><strong>Categoría:</strong> {{ $producto->categoria?->nombre }}</p>

<p><strong>Estado:</strong>
    <span class="px-2 py-1 text-white rounded
        {{ $producto->categoria?->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">
        {{ $producto->categoria?->estado == 1 ? 'Activo' : 'Inactivo' }}
    </span>
</p>

            </div>

        </div>
    </div>
</div>

@endsection