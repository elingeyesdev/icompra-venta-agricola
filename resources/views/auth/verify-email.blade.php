<x-guest-layout>

    <!-- Resend Status -->
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
        </div>
    @endif

    <p class="mb-5 text-sm text-gray-600 leading-relaxed">
        {{ __('¡Gracias por registrarte! Antes de comenzar, verifica tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar.') }}
    </p>

    <div class="mb-6 bg-amber-50 border border-amber-200 rounded-lg px-4 py-3 flex items-start gap-3">
        <span class="text-base leading-none mt-0.5"></span>
        <p class="text-sm text-amber-800 leading-relaxed">
            {{ __("¿No recibiste el correo electrónico? Revisa tu carpeta de correo no deseado o solicita uno nuevo a continuación.") }}
        </p>
    </div>

    <!-- Actions -->
    <div class="flex items-center justify-between gap-4">

        <!-- Resetar el correo -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Resetear correo') }}
            </x-primary-button>
        </form>

        <!-- Log Out -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="text-sm text-gray-500 hover:text-gray-700 underline underline-offset-2 transition-colors">
                {{ __('Cerrar Sesion') }}
            </button>
        </form>

    </div>

</x-guest-layout>