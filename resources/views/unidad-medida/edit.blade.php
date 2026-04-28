@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">
            
            <h2 class="text-white text-2xl font-semibold mb-6 text-center">
                Actualizar Unidad de Medida
            </h2>
            
            <form method="POST" action="{{ route('unidad-medidas.update', $unidadMedida->id) }}">
                @method('PATCH')
                @csrf
                
                @include('unidad-medida.form')

                <div class="flex gap-2 mt-8 justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded transition font-medium">
                        Actualizar
                    </button>
                    <a href="{{ route('unidad-medidas.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded transition font-medium">
                        Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection