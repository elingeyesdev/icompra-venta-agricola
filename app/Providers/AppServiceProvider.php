<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    Password::defaults(fn () => Password::min(12));

    Validator::replacer('min', function ($message, $attribute, $rule, $parameters) {
        if ($attribute === 'password') {
            return 'La contraseña debe tener como mínimo '
                . $parameters[0] . ' caracteres.';
        }

        return $message;
    });
}
}

