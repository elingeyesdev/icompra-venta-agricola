@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-white text-xl font-semibold">
                    Categorías
                </h2>
                       <!--llama a el categoria create dentro de el controller --> 
                <a href="{{ route('categorias.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                     Nueva Categoría
                </a>
            </div>

            <form action="{{ route('categorias.index') }}" method="GET" class="mb-4 flex gap-2">

    <input type="text" name="buscar"
        value="{{ request('buscar') }}"
        placeholder="Buscar categoría..."
        class="w-full px-3 py-2 rounded border">

    <button type="submit"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
        Buscar
    </button>

    @if(request('buscar'))
        <a href="{{ route('categorias.index') }}"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Limpiar
        </a>
    @endif

</form>

            <!-- MENSAJE -->
            @if ($message = Session::get('success'))
                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                    {{ $message }}
                </div>
            @endif

            <!-- TABLA -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-black border-collapse">

                    <thead>
                        <tr class="bg-green-300">
                            <th class="p-2 border">Nro</th>
                            <th class="p-2 border">Nombre</th>
                            <th class="p-2 border">Estado</th>
                            <th class="p-2 border">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($categorias as $categoria)
                            <tr class="border-b">

                                <td class="p-2 border">{{ ++$i }}</td>
                                <td class="p-2 border">{{ $categoria->nombre }}</td>
                                <td class="p-2 border">{{ $categoria->estado }}</td>

                                <td class="p-2 border flex gap-2">

                                    <a href="{{ route('categorias.show', $categoria->id) }}"
                                        class="bg-blue-400 text-white px-3 py-1 rounded">
                                        Ver
                                    </a>

                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                        class="bg-yellow-400 text-white px-3 py-1 rounded">
                                        Editar
                                    </a>

                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('¿Eliminar categoría?')">
                                            Eliminar
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- PAGINACIÓN -->
            <div class="mt-4 text-white">
                {!! $categorias->withQueryString()->links() !!}
            </div>

        </div>

    </div>
</div>

@endsection