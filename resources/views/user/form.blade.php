<div class="grid grid-cols-1 gap-6">
    <div>
        <label class="block text-sm font-bold text-white mb-2 ">Nombre Completo</label>
        <input type="text" name="name" value="{{ old('name', $user?->name) }}" 
            class="w-full rounded-xl border-none text-gray-900 p-3 shadow-inner focus:ring-2 focus:ring-green-400" required>
        {!! $errors->first('name', '<p class="text-red-300 text-xs mt-1 font-bold">:message</p>') !!}
    </div>

    <div>
        <label class="block text-sm font-bold text-white mb-2 ">Correo Electrónico</label>
        <input type="email" name="email" value="{{ old('email', $user?->email) }}" 
            class="w-full rounded-xl border-none text-gray-900 p-3 shadow-inner focus:ring-2 focus:ring-green-400" required>
        {!! $errors->first('email', '<p class="text-red-300 text-xs mt-1 font-bold">:message</p>') !!}
    </div>

    <div>
        <label class="block text-sm font-bold text-white mb-2 ">Contraseña</label>
        <input type="password" name="password" 
            class="w-full rounded-xl border-none text-gray-900 p-3 shadow-inner focus:ring-2 focus:ring-green-400"
            autocomplete="new-password"
            {{ isset($user->id) ? '' : 'required' }}>
    </div>
</div>