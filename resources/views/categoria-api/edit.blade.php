@extends('layouts.app')

@section('content')

<div class="py-12">

<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">


<div class="bg-white shadow p-6 rounded">


<h2 class="text-xl font-semibold mb-4">
    Editar Categoría
</h2>



<form action="{{ route('categoria-api.update',$categoria['id']) }}"
      method="POST">


@csrf
@method('PUT')



<div class="mb-4">


<label>
Nombre
</label>


<input type="text"
       name="nombre"
       value="{{ $categoria['nombre'] }}"
       class="w-full border rounded px-3 py-2"
       required>


</div>



<div class="mb-4">


<label>
Estado
</label>


<select name="estado"
        class="w-full border rounded px-3 py-2">


<option value="Activo"
@if($categoria['estado']=="Activo")
selected
@endif
>
Activo
</option>



<option value="Inactivo"
@if($categoria['estado']=="Inactivo")
selected
@endif
>
Inactivo
</option>


</select>


</div>



<button class="bg-yellow-500 text-white px-4 py-2 rounded">

Actualizar

</button>



</form>


</div>


</div>

</div>


@endsection