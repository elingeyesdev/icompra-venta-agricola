<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Support\SecurityAudit;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar que el usuario envíe los datos obligatorios
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar loguear al usuario
        if (!Auth::attempt($request->only('email', 'password'))) {
    SecurityAudit::record('auth.login.failed');

    return response()->json([
        'message' => 'Credenciales incorrectas'
    ], 401);
}

        // Si las credenciales son correctas, obtenemos al usuario
        $user = Auth::user();
        
        // Creamos el token de Sanctum
        $token = $user->createToken('flutter')->plainTextToken;

        SecurityAudit::record('auth.login.success');

        // Devolvemos la respuesta con el token
        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }
}