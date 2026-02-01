<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|regex:/^[0-9+\-\s]{8,15}$/',
            'rol' => 'required|string|max:50',
            'user_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'cod_agencia' => 'nullable|exists:agencia,id',
        ]);

        $data = $request->only([
            'name',
            'last_name',
            'username',
            'email',
            'phone',
            'rol',
            'cod_agencia',
        ]);

        $data['password'] = Hash::make($validateData['password']);

        $data['status'] = 1;

        $user = User::create($data);

        //aqui falta lo que ingreso de img 

        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'user' => $user
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $id,
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|regex:/^[0-9+\-\s]{8,15}$/',
            'status' => 'nullable|in:1,2',
            'rol' => 'nullable|string|max:50',
            'cod_agencia' => 'nullable|exists:agencia,id',
        ]);

        $data = $request->only([
            'name',
            'last_name',
            'username',
            'email',
            'phone',
            'rol',
            'status',
            'cod_agencia',
        ]);

        if (!empty($validatedData['password'] ?? null)) {
            $data['password'] = Hash::make($validatedData['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Usuario actualizado exitosamente',
            'user' => $user
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->status = 2;
        $user->save();

        return response()->json([
            'message' => 'Usuario desactivado exitosamente',
            'user' => $user,
        ], 200);
    }

    public function activate(User $user)
    {
        $user->status = 1;
        $user->save();

        return response()->json([
            'message' => 'Usuario activado exitosamente',
            'user' => $user,
        ], 200);
    }

    public function updatePass(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return response()->json([
            'message' => 'Contraseña actualizada exitosamente',
            'user' => $user,
        ], 200);
    }

    public function showactivos()
    {
        $users = User::where('status', 1)->get();
        return response()->json([
            'message' => 'Usuarios activos obtenidos exitosamente',
            'users' => $users
        ], 200);
    }

    public function showinactivos()
    {
        $users = User::where('status', 2)->get();
        return response()->json([
            'message' => 'Usuarios no activos obtenidos exitosamente',
            'users' => $users
        ], 200);
    }

    public function show($id)
    {
        $users = User::with('agencia')->find($id);
        if (!$users) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Usuario obtenido exitosamente',
            'user' => $users
        ], 200);
    }

    public function searchBy($name)
    {
        $users = User::where('name', 'LIKE', '%' . $name . '%')->get();

        if ($users->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron usuarios'
            ], 404);
        }

        return response()->json([
            'message' => 'Resultado de la busqueda',
            'users' => $users
        ], 200);
    }

    public function showUser($id)
    {
        $user = User::with('agencia')->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Usuario encontrado',
            'user' => $user
        ], 200);
    }
}
