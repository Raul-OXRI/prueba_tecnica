<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'dia' => 'required|string|max:50',
            'hora_apertura' => 'required|date_format:H:i',
            'hora_cierre' => 'required|date_format:H:i|after:hora_apertura',
            'cod_agencia' => 'required|exists:agencia,cod_agencia',
        ]);

        $data = $request->only([
            'dia',
            'hora_apertura',
            'hora_cierre',
            'cod_agencia',
        ]);

        $data['status'] = 1; // Establecer estado activo por defecto

        $horario = Horario::create($data);

        return response()->json([
            'message' => 'Horario creado exitosamente',
            'horario' => $horario
        ], 201);
    }
}
