<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Nombre completo-->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')"  class="text-green-800 font-semibold"  />

            <x-text-input
                id="name"
                class="block mt-1 w-full rounded-lg border-green-300 focus:border-green-600 focus:ring-green-600"
                type="text"
                name="name"
                :value="old('name')"
                required autofocus autocomplete="name"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- input del correo electronico -->
        <div>
            <x-input-label for="email" :value="__('Insertar correo electronico')" class="text-green-800 font-semibold" />

            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg border-green-300 focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                required autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- input de la contraseña -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password"
                required autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- input de confirmar contraseña -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirma tu contraseña')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-2">
            <a href="{{ route('login') }}" class="text-sm text-green-700 hover:text-green-900 underline underline-offset-2">
                ¿Ya tienes una cuenta?
            </a>

            <x-primary-button class="bg-green-900 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>