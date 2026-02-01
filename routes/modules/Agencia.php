<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenciaController;

Route::group(['prefix' => 'agencia', 'middleware' => ['auth:sanctum', 'rol:admin.consulta']], function () {
    // las rutas de creación y actualización
    Route::post('/store', [AgenciaController::class, 'store']);
    Route::put('/update/{id}', [AgenciaController::class, 'update']);

    // las rutas de activación y desactivación
    Route::put('/desactivar/{agencia}', [AgenciaController::class, 'destroy']);
    Route::put('/activar/{agencia}', [AgenciaController::class, 'activate']);

    // las rutas de consulta
    Route::get('/', [AgenciaController::class, 'showactivos']);
    Route::get('/inactivos', [AgenciaController::class, 'showinactivos']);
    Route::get('/search/{name}', [AgenciaController::class, 'searchBy']);
    Route::get('/show/{id}', [AgenciaController::class, 'show']);
    Route::get('/showagencia/{id}', [AgenciaController::class, 'showagencia']);
    
});