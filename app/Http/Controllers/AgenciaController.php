<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Agencia;

class AgenciaController extends Controller
{
    // Crear una nueva agencia
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'serie_agencia' => 'required|string|max:100',
            'codigo_agencia' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string|max:50',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'longitud' => 'required|string|max:100',
            'latitud' => 'required|string|max:100',
            'cod_municipio' => 'required|integer',
        ]);

        $data = $request->only([
            'name',
            'serie_agencia',
            'codigo_agencia',
            'address',
            'phone',
            'longitud',
            'latitud',
            'cod_municipio',
        ]);

        $data['status'] = 1; // Establecer estado activo por defecto

        $agencia = Agencia::create($data);

        return response()->json([
            'message' => 'Agencia creada exitosamente',
            'agencia' => $agencia
        ], 201);
    }

    // Actualizar una agencia existente
    public function update(Request $request, $id)
    {
        $agencia = Agencia::find($id);

        if (!$agencia) {
            return response()->json([
                'message' => 'Agencia no encontrada'
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'serie_agencia' => 'sometimes|required|string|max:100',
            'codigo_agencia' => 'sometimes|required|string|max:100',
            'address' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'status' => 'sometimes|required|string|max:50',
            'longitud' => 'sometimes|required|string|max:100',
            'latitud' => 'sometimes|required|string|max:100',
            'cod_municipio' => 'sometimes|required|integer',
        ]);

        $agencia->update($validatedData);

        return response()->json([
            'message' => 'Agencia actualizada exitosamente',
            'agencia' => $agencia
        ], 200);
    }

    // Desactivar una agencia se usa el estado ya que por buenas practicas no se recomienda eliminar registros
    public function destroy(Agencia $agencia)
    {
        $agencia->status = 2;
        $agencia->save();

        return response()->json([
            'message' => 'Agencia desactivada exitosamente',
            'agencia' => $agencia
        ], 200);
    }

    // Activar una agencia
    public function activate(Agencia $agencia)
    {
        $agencia->status = 1;
        $agencia->save();

        return response()->json([
            'message' => 'Agencia activada exitosamente',
            'agencia' => $agencia
        ], 200);
    }

    // Obtener una agencia con su municipio y departamento
    public function showagencia($id)
    {
        $agencia = Agencia::with('municipio.departamento')->get();

        return response()->json([
            'message' => 'Agencia obtenida exitosamente',
            'agencia' => $agencia
        ], 200);
    }

    // Buscar agencias por nombre
    public function searchBy($name)
    {
        $agencias = Agencia::with('municipio.departamento')->where('name', 'LIKE', '%' . $name . '%')->get();

        return response()->json([
            'message' => 'Resultado de la busqueda',
            'agencias' => $agencias
        ], 200);
    }

    // Obtener una agencia por ID
    public function show($id)
    {
        $agencia = Agencia::find($id);
        if (!$agencia) {
            return response()->json([
                'message' => 'Agencia no encontrada'
            ], 404);
        }
        return response()->json([
            'message' => 'Agencia encontrada',
            'agencia' => $agencia
        ], 200);
    }

    // Obtener todas las agencias activas
    public function showactivos(){
        $agencias = Agencia::where('status', 1)->get();
        return response()->json([
            'message' => 'Agencias activas obtenidas exitosamente',
            'agencias' => $agencias
        ], 200);
    }

    // Obtener todas las agencias inactivas
    public function showinactivos(){
        $agencias = Agencia::where('status', 2)->get();
        return response()->json([
            'message' => 'Agencias inactivas obtenidas exitosamente',
            'agencias' => $agencias
        ], 200);
    }
    //solo falta la implemntacion de imagenes
}
