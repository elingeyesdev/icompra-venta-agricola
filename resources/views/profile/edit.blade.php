@extends('layouts.app') @section('content') <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="mb-6 px-4 sm:px-0">
                <h3 class="text-2xl font-bold text-green-900">Configuración de Perfil</h3>
                <p class="text-sm text-gray-600">Administra la información de tu cuenta en AgroDirecto.</p>
            </div>

            <div class="p-4 sm:p-8 bg-white border border-green-100 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white border border-green-100 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white border border-red-100 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl text-red-600">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection