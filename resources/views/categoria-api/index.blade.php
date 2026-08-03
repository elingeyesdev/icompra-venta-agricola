@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-green-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">

                <h2 class="text-white text-xl font-semibold">
                    Categorías (Consumiendo API)
                </h2>

                <a href="{{ route('categoria-api.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded">
                    Nueva Categoría
                </a>

            </div>


            @if(session('success'))

                <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
                    {{ session('success') }}
                </div>

            @endif


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

                    @php
                        $i = 0;
                    @endphp


                    @foreach($categorias as $categoria)

                        <tr>

                            <td class="p-2 border">
                                {{ ++$i }}
                            </td>


                            <td class="p-2 border">
                                {{ $categoria['nombre'] }}
                            </td>


                            <td class="p-2 border">
                                {{ $categoria['estado'] }}
                            </td>


                            <td class="p-2 border flex gap-2">


                                <a href="{{ route('categoria-api.edit',$categoria['id']) }}"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded">
                                    Editar
                                </a>



                                <form action="{{ route('categoria-api.destroy',$categoria['id']) }}"
                                      method="POST">

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


        </div>

    </div>

</div>


@endsection