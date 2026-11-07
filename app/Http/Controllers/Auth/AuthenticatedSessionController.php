<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Support\SecurityAudit;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

          $user = $request->user();

        // Administrador: acceso al dashboard.
        if ($user->hasRole('administrador')) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Vendedor: no puede entrar al dashboard administrativo.
        if ($user->hasRole('vendedor')) {
            return redirect()->route('profile.edit');
        }

        // Usuario sin rol asignado.
       Auth::logout();

return redirect()->route('login')->withErrors([
    'email' => 'No puedes ingresar. Tu cuenta no tiene un rol asignado. Contacta al administrador.'
]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        SecurityAudit::record('auth.logout');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
