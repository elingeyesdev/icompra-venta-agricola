@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <h2 class="text-white text-xl font-semibold mb-4">
                Crear Categoría
            </h2>

            <!-- FORM -->
            <form method="POST" action="{{ route('categorias.store') }}">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-white mb-2">Nombre</label>
                    <input type="text" name="nombre"
                        value="{{ old('nombre') }}"
                        class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400"
                        placeholder="Nombre de la categoría">

                    @error('nombre')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!--  ESTADO  -->
                <div class="mb-4">
                    <label class="block text-white mb-2">Estado</label>

                    <select name="estado"
                        class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

                        <option value="">-- Seleccionar --</option>

                        <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>
                            Activo
                        </option>

                        <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>
                            Inactivo
                        </option>

                    </select>

                    @error('estado')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BOTONES --> 
                <div class="flex gap-2">

                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        Guardar
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