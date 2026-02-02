<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        // Definir los orígenes permitidos
        $allowedOrigins = [
            'http://localhost:5173',                // Vite en local
            'https://reactprueba-production.up.railway.app', // tu frontend en Railway
            'https://front-skynet.onrender.com',    // tu frontend
        ];

        // Obtener el origen de la solicitud
        $origin = $request->headers->get('Origin');

        // Configurar los encabezados CORS
        $headers = [
            'Access-Control-Allow-Origin'      => in_array($origin, $allowedOrigins) ? $origin : $allowedOrigins[0],
            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
        ];

        // Responder a las solicitudes OPTIONS
        if ($request->isMethod('OPTIONS')) {
            return response()->json('{"method":"OPTIONS"}', 200, $headers);
        }

        // Continuar con la solicitud y agregar los encabezados CORS a la respuesta
        $response = $next($request);
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
