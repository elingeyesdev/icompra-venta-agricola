<div class="space-y-4">

    <div>
        <label class="block text-white mb-1">Nombre</label>
        <input type="text" name="nombre"
            value="{{ old('nombre', $unidadMedida?->nombre) }}"
            placeholder="Ej: Kilogramo, Litro, Unidad"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('nombre')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-white mb-1">Abreviatura</label>
        <input type="text" name="abreviatura"
            value="{{ old('abreviatura', $unidadMedida?->abreviatura) }}"
            placeholder="Ej: Kg, Ltr, Unid"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('abreviatura')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-white mb-1">Estado</label>

        <select name="estado"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

            <option value="">-- Seleccionar --</option>

            <option value="1" {{ old('estado', $unidadMedida?->estado) == 1 ? 'selected' : '' }}>
                Activo
            </option>

            <option value="0" {{ old('estado', $unidadMedida?->estado) == 0 ? 'selected' : '' }}>
                Inactivo
            </option>

        </select>

        @error('estado')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>