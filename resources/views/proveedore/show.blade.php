@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-white text-2xl font-semibold">
                    Detalle del Proveedor
                </h2>

                <a href="{{ route('proveedores.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                    Volver
                </a>
            </div>

            <!-- CARD DE DATOS -->
            <div class="bg-white rounded-lg shadow p-6 space-y-4">

                <div class="border-b pb-2">
                    <span class="font-semibold text-gray-600">Nombre:</span>
                    <span class="ml-2 text-gray-800">{{ $proveedore->nombre }}</span>
                </div>

                <div class="border-b pb-2">
                    <span class="font-semibold text-gray-600">Correo:</span>
                    <span class="ml-2 text-gray-800">{{ $proveedore->correo }}</span>
                </div>

                <div class="border-b pb-2">
                    <span class="font-semibold text-gray-600">Teléfono:</span>
                    <span class="ml-2 text-gray-800">{{ $proveedore->telefono }}</span>
                </div>

                <div class="border-b pb-2">
                    <span class="font-semibold text-gray-600">Dirección:</span>
                    <span class="ml-2 text-gray-800">{{ $proveedore->direccion }}</span>
                </div>

                <div class="border-b pb-2">
                    <span class="font-semibold text-gray-600">Razón Social:</span>
                    <span class="ml-2 text-gray-800">{{ $proveedore->razon_social }}</span>
                </div>

                <!-- ESTADO CON COLOR -->
                <div>
                    <span class="font-semibold text-gray-600">Estado:</span>

                    <span class="ml-2 px-3 py-1 rounded text-white text-sm
                        {{ $proveedore->estado == 1 ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ $proveedore->estado == 1 ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection