@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">
            <h2 class="text-white text-xl font-semibold mb-4 text-center">Crear Unidad de Medida</h2>
            
            <form method="POST" action="{{ route('unidad-medidas.store') }}">
                @csrf
                @include('unidad-medida.form')

                <div class="flex gap-2 mt-6 justify-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Guardar</button>
                    <a href="{{ route('unidad-medidas.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection