<div class="space-y-4">

    <!-- Nombre -->
    <div>
        <label class="block text-white mb-1">Nombre</label>
        <input type="text" name="nombre"
            value="{{ old('nombre', $proveedore?->nombre) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">
        
        @error('nombre')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Correo -->
    <div>
        <label class="block text-white mb-1">Correo</label>
        <input type="email" name="correo"
            value="{{ old('correo', $proveedore?->correo) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('correo')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Teléfono -->
    <div>
        <label class="block text-white mb-1">Teléfono</label>
        <input type="text" name="telefono"
            value="{{ old('telefono', $proveedore?->telefono) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('telefono')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Dirección -->
    <div>
        <label class="block text-white mb-1">Dirección</label>
        <input type="text" name="direccion"
            value="{{ old('direccion', $proveedore?->direccion) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('direccion')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Razón Social -->
    <div>
        <label class="block text-white mb-1">Razón Social</label>
        <input type="text" name="razon_social"
            value="{{ old('razon_social', $proveedore?->razon_social) }}"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

        @error('razon_social')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Estado -->
    <div>
        <label class="block text-white mb-1">Estado</label>

        <select name="estado"
            class="w-full px-3 py-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-400">

            <option value="">-- Seleccionar --</option>

            <option value="1" {{ old('estado', $proveedore?->estado) == 1 ? 'selected' : '' }}>
                Activo
            </option>

            <option value="0" {{ old('estado', $proveedore?->estado) == 0 ? 'selected' : '' }}>
                Inactivo
            </option>

        </select>

        @error('estado')
            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>