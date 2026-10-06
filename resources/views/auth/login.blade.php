<x-guest-layout>

    <!-- el estado de la sesion -->
    <x-auth-session-status class="mb-4 text-green-600" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- input de correo electronico -->
        <div>
            <x-input-label for="email" :value="__('Ingresa tu correo')" class="text-green-800 font-semibold" />

            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- input de contraseña -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password"
                required autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Boton para recordar -->
        <div class="flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                name="remember"
            >
            <label for="remember_me" class="ms-2 text-sm text-gray-600 cursor-pointer">
                {{ __('Recuerdame') }}
            </label>
        </div>

        <!-- Acciones -->
        <div class="flex items-center justify-between mt-2">
            @if (Route::has('password.request'))
                <a class="text-sm text-green-700 hover:text-green-900 underline underline-offset-2"
                   href="{{ route('password.request') }}">
                    {{ __('¿Olvidates tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Iniciar Sesion') }} &rarr;
            </x-primary-button>
        </div>

    </form>

    <!-- link para registrarse -->
    <p class="mt-6 text-center text-sm text-gray-500">
        ¿no tenes cuenta?
        <a href="{{ route('register') }}" class="text-green-700 hover:text-green-900 font-semibold underline underline-offset-2">
            registrate aqui
        </a>
    </p>

</x-guest-layout>