@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <h2 class="text-white text-xl font-semibold mb-4">
                Actualizar Compra
            </h2>

            <!-- FORM -->
            <form method="POST" action="{{ route('compras.update', $compra->id) }}">
                @csrf
                @method('PATCH')

                <div class="space-y-4">

                    <!-- PRODUCTO -->
                    <div>
                        <label class="text-white">Producto</label>

                        <select name="producto_id" class="w-full px-3 py-2 rounded border">

                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}"
                                    {{ old('producto_id', $compra->producto_id) == $producto->id ? 'selected' : '' }}>

                                    {{ $producto->nombre }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- CANTIDAD -->
                    <div>
                        <label class="text-white">Cantidad</label>
                        <input type="number" name="cantidad"
                            value="{{ old('cantidad', $compra->cantidad) }}"
                            class="w-full px-3 py-2 rounded border">
                    </div>

                    <!-- PRECIO -->
                    <div>
                        <label class="text-white">Precio</label>
                        <input type="number" step="0.01" name="precio"
                            value="{{ old('precio', $compra->precio) }}"
                            class="w-full px-3 py-2 rounded border">
                    </div>

                </div>

                <!-- BOTONES -->
                <div class="flex gap-2 mt-6">

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