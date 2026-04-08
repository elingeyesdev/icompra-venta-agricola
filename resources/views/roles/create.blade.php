<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear Rol
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <label class="block mb-2">Nombre del Rol</label>

                    <input type="text" name="name"
                        class="border w-full px-3 py-2 mb-4 rounded">

                    <button class="bg-green-500 text-white px-4 py-2 rounded">
                        Guardar
                    </button>

                    <a href="{{ route('roles.index') }}"
                        class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">
                        Volver
                    </a>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>