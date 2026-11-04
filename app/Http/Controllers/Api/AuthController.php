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

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (!Auth::attempt($request->only('email', 'password'))) {
    SecurityAudit::record('auth.login.failed');

    return response()->json([
        'message' => 'Credenciales incorrectas'
    ], 401);
}
        $user = Auth::user();
        
        $token = $user->createToken('flutter')->plainTextToken;

        SecurityAudit::record('auth.login.success');

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }
}