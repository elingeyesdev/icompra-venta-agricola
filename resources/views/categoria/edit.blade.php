@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <h2 class="text-white text-xl font-semibold mb-4">
                Actualizar Categoría
            </h2>

            <!-- FORM -->
            <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                @csrf
                @method('PATCH')

                {{-- Tu formulario reutilizable --}}
                @include('categoria.form')

                <!-- BOTONES -->
                <div class="flex gap-2 mt-4">

                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Actualizar
                    </button>

                    <a href="{{ route('categorias.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                        Volver
                    </a>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection