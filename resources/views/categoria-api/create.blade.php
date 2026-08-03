@extends('layouts.app')

@section('content')

<div class="py-12">

<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">


<div class="bg-white shadow p-6 rounded">


<h2 class="text-xl font-semibold mb-4">
    Crear Categoría (API)
</h2>



<form action="{{ route('categoria-api.store') }}" method="POST">

@csrf


<div class="mb-4">

<label class="block">
    Nombre
</label>

<input type="text"
       name="nombre"
       class="w-full border rounded px-3 py-2"
       required>

</div>



<div class="mb-4">

<label class="block">
    Estado
</label>

<select name="estado"
        class="w-full border rounded px-3 py-2">


<option value="Activo">
Activo
</option>


<option value="Inactivo">
Inactivo
</option>


</select>

</div>



<button class="bg-blue-500 text-white px-4 py-2 rounded">

Guardar

</button>



</form>


</div>


</div>

</div>


@endsection