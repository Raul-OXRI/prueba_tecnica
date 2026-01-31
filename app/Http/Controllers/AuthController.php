<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentiales = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        // pendiente
        $credentiales['username'] = strtolower($credentiales['username']);

        if (!Auth::attempt($credentiales)) {

            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $user = Auth::user();

        if ($user->status !== 1) {
            return response()->json([
                'message' => 'Usuario inactivo, contacte al administrador'
            ], 403);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message' => 'Login correcto',
            'token'   => $token,
            'user'    => [
                'id'        => $user->id,
                'name'      => $user->name,
                'last_name' => $user->last_name ?? null,
                'rol'       => $user->rol,
                'user_img'  => $user->user_img ?? null,
                'status'    => $user->status,
            ],
        ], 200);
    }

    // Cerrar sesión
    // elimina el token actual del usuario autenticado
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ], 200);
    }


}
