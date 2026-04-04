<x-app-layout>


     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-gray-200 border-green-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                   <h1>Prueba de Roles - Spatie</h1>

        @role('administrador')
            <p style="color: green; font-weight: bold;">
                Soy Administrador
            </p>
        @endrole

        @role('usuario')
            <p style="color: blue; font-weight: bold;">
                Soy Usuario
            </p>    
        @endrole

        @hasanyrole('administrador|usuario')
            <p>Tengo al menos un rol</p>
        @endhasanyrole

        @unlessrole('administrador')
            <p>No soy administrador</p>
        @endunlessrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>