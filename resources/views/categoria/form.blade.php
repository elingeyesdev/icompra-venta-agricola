<div class="space-y-4">

    <!-- Nombre -->
    <div>
        <label class="block text-white mb-1">Nombre</label>
        <input type="text" name="nombre"
            value="{{ old('nombre', $categoria?->nombre) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('nombre')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Estado -->
    <div>
        <label class="block text-white mb-1">Estado</label>

        <select name="estado"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

            <option value="">-- Seleccionar --</option>

            <option value="1" {{ old('estado', $categoria?->estado) == 1 ? 'selected' : '' }}>
                Activo
            </option>

            <option value="0" {{ old('estado', $categoria?->estado) == 0 ? 'selected' : '' }}>
                Inactivo
            </option>

        </select>

        @error('estado')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    </div>

</div>