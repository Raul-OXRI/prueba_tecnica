<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    // Mostrar todos los municipios
    public function show()
    {
        $municipios = Municipio::all();
        return response()->json([
            'message' => 'Lista de municipios',
            'municipios' => $municipios
        ]);
    }

    // Buscar municipios por nombre
    public function searchBy($name)
    {
        $municipios = Municipio::where('name', 'LIKE', '%' . $name . '%')->get();
        return response()->json([
            'message' => 'Resultado de la búsqueda',
            'municipios' => $municipios
        ]);
    }

    // Mostrar un municipio por ID
    public function showmuni($id)
    {
        $municipio = Municipio::where('id', $id)->get();

        if (!$municipio) {
            return response()->json([
                'message' => 'Municipio no encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Detalle del municipio',
            'municipio' => $municipio
        ]);
    }

    // Mostrar municipios por ID de departamento
    public function showByid($id){
        $municipios = Municipio::where('cod_departamento', $id)->orderBy('id', 'asc')->get();

        if($municipios -> isEmpty()){
            return response()->json([
                'message' => 'No se encontraron municipios para este departamento'
            ], 404);
        }

        return response()->json([
            'message' => 'Lista de municipios por departamento',
            'municipios' => $municipios
        ]);
    }
}
