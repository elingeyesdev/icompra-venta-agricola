<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        // Si las credenciales son correctas, obtenemos al usuario
        $user = Auth::user();
        
        // Creamos el token de Sanctum
        $token = $user->createToken('flutter')->plainTextToken;

        // Devolvemos la respuesta con el token
        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }
}