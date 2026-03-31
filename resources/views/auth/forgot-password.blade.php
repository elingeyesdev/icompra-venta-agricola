<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

    <p class="mb-5 text-sm text-gray-600 leading-relaxed">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Solo ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.') }}
    </p>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electronico')" class="text-green-800 font-semibold" />

            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-2">
            <a href="{{ route('login') }}" class="text-sm text-green-700 hover:text-green-900 underline underline-offset-2">
                &larr; Regresar al login
            </a>

            <x-primary-button class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Enviar enlace de restablecimiento') }} 📧
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>