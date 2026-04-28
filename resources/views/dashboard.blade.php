@extends('layouts.app')

@section('content')
<div class="py-12 flex flex-col justify-center items-center" style="min-height: calc(100vh - 200px);">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-full">
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-green-900 mb-2">
                AgroDirecto <span class="text-green-600">2026</span>
            </h1>
            <p class="text-gray-600 font-medium">Panel de Gestión Administrativa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            
            <a href="{{ route('productos.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-500 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Productos</h3>
                <p class="text-sm text-gray-500 mt-1">Control de inventarios</p>
            </a>

            <a href="{{ route('compras.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-500 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Compras</h3>
                <p class="text-sm text-gray-500 mt-1">Registro de entradas</p>
            </a>

            <a href="{{ route('categorias.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-500 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Categorías</h3>
                <p class="text-sm text-gray-500 mt-1">Clasificación de artículos</p>
            </a>

            <a href="{{ route('proveedores.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-500 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Proveedores</h3>
                <p class="text-sm text-gray-500 mt-1">Gestión de contactos</p>
            </a>

            <a href="{{ route('unidad-medidas.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-500 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Unidades</h3>
                <p class="text-sm text-gray-500 mt-1">Métricas de medida</p>
            </a>

            <a href="{{ route('users.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-600 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Personal</h3>
                <p class="text-sm text-gray-500 mt-1">Gestión de usuarios base</p>
            </a>

            <a href="{{ route('roles.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-green-100 hover:shadow-xl hover:border-green-600 transition-all text-center">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-600 transition-colors">Roles</h3>
                <p class="text-sm text-gray-500 mt-1">Gestión de roles </p>
            </a>

        </div>
    </div>
</div>
@endsection