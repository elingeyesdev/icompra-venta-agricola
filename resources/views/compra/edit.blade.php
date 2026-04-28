@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- Título -->
            <h2 class="text-white text-xl font-semibold mb-4">
                Actualizar Compra
            </h2>

            <!-- Formulario -->
            <form method="POST" action="{{ route('compras.update', $compra->id) }}">
                @csrf
                @method('PATCH')

                @include('compra.form')

                <!-- Botones -->
                <div class="flex gap-2 mt-4">

                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Actualizar
                    </button>

                    <a href="{{ route('compras.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Volver
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection