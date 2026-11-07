<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

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
        // Forzar HTTPS en producción (Render)
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Contraseñas con mínimo 12 caracteres
        Password::defaults(fn () => Password::min(12));

        // Mensaje personalizado para la validación de contraseñas
        Validator::replacer('min', function ($message, $attribute, $rule, $parameters) {
            if ($attribute === 'password') {
                return 'La contraseña debe tener como mínimo '
                    . $parameters[0] . ' caracteres.';
            }

            return $message;
        });
    }
}

