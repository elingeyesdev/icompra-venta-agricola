@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 shadow-sm sm:rounded-lg p-6">

            <h2 class="text-white text-xl font-semibold mb-4 italic">
                Editar Usuario: {{ $user->name }}
            </h2>

            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('user.form')

                <div class="flex gap-2 mt-4 border-t border-green-700 pt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
                        Actualizar
                    </button>

                    <a href="{{ route('users.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                        Volver
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>
@endsection