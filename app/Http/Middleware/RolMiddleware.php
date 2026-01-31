<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario tiene alguno de los roles permitidos
        if (!$user || !in_array($user->rol, $roles)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'No tiene permisos para esta acción',
                ], 403);
            }
            return response()->view('errors.403', [], 403);
        }


        return $next($request);
    }
}
