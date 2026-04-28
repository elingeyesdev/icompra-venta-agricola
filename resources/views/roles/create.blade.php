@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <label class="block mb-2 text-white">Nombre del Rol</label>

                <input type="text" name="name"
                    class="border w-full px-3 py-2 mb-4 rounded">

                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Guardar
                </button>

                <a href="{{ route('roles.index') }}"
                    class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">
                    Volver
                </a>

            </form>

        </div>

    </div>
</div>

@endsection