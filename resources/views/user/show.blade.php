@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-green-800 p-8 rounded-3xl shadow-2xl">
            <div class="flex justify-between items-center mb-8 border-b border-green-700 pb-4">
                <h2 class="text-white text-3xl font-bold italic text-shadow">Ficha de Usuario</h2>
                <a href="{{ route('users.index') }}" class="bg-white text-green-800 px-6 py-2 rounded-xl font-bold hover:bg-green-100 transition">
                    Volver
                </a>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-2xl">
                <div class="p-8 space-y-6">
                    <div class="flex flex-col border-b border-gray-100 pb-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Nombre Completo</span>
                        <span class="text-2xl font-semibold text-green-900">{{ $user->name }}</span>
                    </div>

                    <div class="flex flex-col border-b border-gray-100 pb-4">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Correo Electrónico</span>
                        <span class="text-xl font-medium text-gray-700">{{ $user->email }}</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Fecha del Ingreso</span>
                        <span class="text-lg text-gray-600">{{ $user->created_at->format('d/m/Y - H:i') }}</span>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 flex justify-center">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-10 py-3 rounded-2xl font-bold shadow-md transition-all transform active:scale-95">
                        Editar Información
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection