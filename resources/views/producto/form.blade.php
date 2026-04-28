<div class="space-y-4">
    <div>
        <label class="text-white">Categoría</label>
        <select name="categoria_id" class="w-full px-3 py-2 rounded border">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}"
                    {{ old('categoria_id', $producto?->categoria_id) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-white">Unidad de Medida</label>
        <select name="unidad_medida_id" class="w-full px-3 py-2 rounded border">
            @foreach($unidades as $unidad)
                <option value="{{ $unidad->id }}"
                    {{ old('unidad_medida_id', $producto?->unidad_medida_id) == $unidad->id ? 'selected' : '' }}>
                    {{ $unidad->nombre }} ({{ $unidad->abreviatura }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="text-white">Nombre</label>
        <input type="text" name="nombre"
            value="{{ old('nombre', $producto?->nombre) }}"
            class="w-full px-3 py-2 rounded border">
    </div>

    <div>
        <label class="text-white">Descripción</label>
        <input type="text" name="descripcion"
            value="{{ old('descripcion', $producto?->descripcion) }}"
            class="w-full px-3 py-2 rounded border">
    </div>

    <div>
        <label class="text-white">Precio</label>
        <input type="number" step="0.01" name="precio"
            value="{{ old('precio', $producto?->precio) }}"
            class="w-full px-3 py-2 rounded border">
    </div>

    <div>
        <label class="text-white">Estado</label>
        <select name="estado" class="w-full px-3 py-2 rounded border">
            <option value="1" {{ old('estado', $producto?->estado) == 1 ? 'selected' : '' }}>
                Activo
            </option>
            <option value="0" {{ old('estado', $producto?->estado) == 0 ? 'selected' : '' }}>
                Inactivo
            </option>
        </select>
    </div>
</div>