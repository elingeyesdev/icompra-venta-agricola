<x-guest-layout>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-green-800 font-semibold" />

            <x-text-input
                id="email"
                class="block mt-1 w-full rounded-lg"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required autofocus autocomplete="username"
                placeholder="you@example.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="password" :value="__('New Password')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password"
                required autocomplete="new-password"
                placeholder="At least 8 characters"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm New Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="text-green-800 font-semibold" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full rounded-lg"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
                placeholder="Repeat your new password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-2">
            <x-primary-button class="bg-green-800 hover:bg-green-900 text-white px-6 py-2 rounded-lg transition-colors">
                {{ __('Reset Password') }} 
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>