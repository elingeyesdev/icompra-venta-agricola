<x-guest-layout>

    <div class="mb-6 bg-amber-50 border border-amber-200 rounded-lg px-4 py-3 flex items-start gap-3">
        <span class="text-base leading-none mt-0.5"></span>
        <p class="text-sm text-amber-800 leading-relaxed">
            {{ __('Esta es una zona segura. Por favor, confirme su contraseña antes de continuar.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password"
                required autocomplete="current-password"
                autofocus
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-2">
            <x-primary-button class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Confirmar') }} &rarr;
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>