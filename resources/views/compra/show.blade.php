@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-xl font-semibold">
                    Detalle de Compra
                </h2>

                <a href="{{ route('compras.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Volver
                </a>
            </div>

            <!-- CONTENIDO -->
            <div class="bg-white rounded p-5 space-y-3">

                <!-- PROVEEDOR -->
                <p>
                    <strong>Proveedor:</strong>
                    {{ $compra->proveedore?->nombre ?? 'Sin proveedor' }}
                </p>

                <!-- ESTADO PROVEEDOR -->
                <p>
                    <strong>Estado proveedor:</strong>

                    <span class="px-2 py-1 text-white rounded
                        {{ $compra->proveedor?->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">

                        {{ $compra->proveedore?->estado == 1 ? 'Activo' : 'Inactivo' }}
                    </span>
                </p>

                <hr>

                <!-- FECHA -->
                <p>
                    <strong>Fecha compra:</strong>
                    {{ $compra->fecha_compra }}
                </p>

                <!-- TOTAL -->
                <p>
                    <strong>Total compra:</strong>
                    {{ $compra->total_compra }}
                </p>

                <!-- ESTADO COMPRA -->
                <p>
                    <strong>Estado compra:</strong>

                    <span class="px-2 py-1 text-white rounded
                        {{ $compra->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">

                        {{ $compra->estado == 1 ? 'Completada' : 'Pendiente' }}
                    </span>
                </p>

            </div>

        </div>

    </div>
</div>

@endsection