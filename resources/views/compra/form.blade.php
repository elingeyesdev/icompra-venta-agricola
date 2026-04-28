<div class="space-y-4">

    <div>
        <label class="text-white">Proveedor</label>
        <select name="proveedor_id" class="w-full px-3 py-2 rounded border">
            <option value="">-- Seleccionar proveedor --</option>
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}"
                    {{ old('proveedor_id', $compra?->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select>
        @error('proveedor_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="bg-green-900 p-4 rounded border border-green-700">
        <label class="text-white">Producto</label>
        <select name="producto_id" id="producto_id" class="w-full px-3 py-2 rounded border mb-4">
            <option value="">-- Seleccionar producto --</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                    {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                </option>
            @endforeach
        </select>
        @error('producto_id')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-white">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad"
                    value="{{ old('cantidad') }}"
                    class="w-full px-3 py-2 rounded border" placeholder="0">
                @error('cantidad')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-white">Precio Unitario</label>
                <input type="number" step="0.01" name="precio" id="precio"
                    value="{{ old('precio') }}"
                    class="w-full px-3 py-2 rounded border" placeholder="0.00">
                @error('precio')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div>
        <label class="text-white">Fecha Compra</label>
        <input type="date" name="fecha_compra"
            value="{{ old('fecha_compra', $compra?->fecha_compra ?? date('Y-m-d')) }}"
            class="w-full px-3 py-2 rounded border">
        @error('fecha_compra')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-white font-bold">Total Compra</label>
        <input type="number" step="0.01" name="total_compra" id="total_compra"
            value="{{ old('total_compra', $compra?->total_compra) }}"
            class="w-full px-3 py-2 rounded border bg-gray-100" readonly>
        @error('total_compra')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="text-white">Estado</label>
        <select name="estado" class="w-full px-3 py-2 rounded border">
            <option value="1" {{ old('estado', $compra?->estado) == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('estado', $compra?->estado) == 0 ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('estado')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    </div>

</div>

<script>
    const inputCant = document.getElementById('cantidad');
    const inputPrecio = document.getElementById('precio');
    const inputTotal = document.getElementById('total_compra');

    function calcular() {
        const cant = parseFloat(inputCant.value) || 0;
        const prec = parseFloat(inputPrecio.value) || 0;
        inputTotal.value = (cant * prec).toFixed(2);
    }

    inputCant.addEventListener('input', calcular);
    inputPrecio.addEventListener('input', calcular);
</script>