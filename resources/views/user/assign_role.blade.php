@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 p-8 rounded-3xl shadow-2xl border-4 border-green-700">
            
            <div class="mb-8 border-b border-green-600 pb-4">
                <h2 class="text-white text-2xl font-bold italic">Configuración de Seguridad</h2>
                <p class="text-green-200 text-sm mt-1">Asignando permisos a: <span class="text-white font-bold">{{ $user->name }}</span></p>
            </div>

            <form method="POST" action="{{ route('users.update-role', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-white mb-2">Usuario Seleccionado</label>
                        <input type="text" value="{{ $user->name }}" 
                            class="w-full rounded-xl border-none bg-green-900 text-green-300 p-3 shadow-inner cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-white mb-4 ">Selecciona el Rol del Sistema</label>
                        
                        <div class="space-y-3">
                            @foreach($roles as $role)
                                <label class="flex items-center p-4 bg-white rounded-xl cursor-pointer hover:bg-green-50 transition-all shadow-md group">
                                    <input type="radio" name="roles" value="{{ $role->name }}" 
                                        {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 border-gray-300 focus:ring-green-400">
                                    
                                    <div class="ml-4">
                                        <span class="block text-gray-900 font-bold uppercase text-sm group-hover:text-green-800">
                                            {{ $role->name }}
                                        </span>
                                        <span class="block text-gray-900 text-xs ">
                                            Activa las funciones de {{ strtolower($role->name) }}
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 mt-4">
                        <a href="{{ route('users.index') }}" class="text-white hover:underline font-bold text-sm">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg transform transition active:scale-95">
                            Guardar Seguridad
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection