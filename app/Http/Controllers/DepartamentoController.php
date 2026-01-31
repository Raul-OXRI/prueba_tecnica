<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    // Mostrar todos los departamentos
    public function show()
    {
        $departamentos = Departamento::all();
        return response()->json([
            'message' => 'Lista de departamentos',
            'departamentos' => $departamentos
        ]);
    }

    // Buscar departamentos por nombre
    public function searchBy($name)
    {
        $departamentos = Departamento::where('name', 'LIKE', '%' . $name . '%')->get();
        return response()->json([
            'message' => 'Resultado de la búsqueda',
            'departamentos' => $departamentos
        ]);
    }
}
