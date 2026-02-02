<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgenciaController;


Route::post('/login', [AuthController::class, 'login']);

Route::get('/ladin/search/{name}', [AgenciaController::class, 'searchBy']);
Route::get('/ladin/showagencia/{id}', [AgenciaController::class, 'showagencia']);
Route::get('/ladin', [AgenciaController::class, 'showactivos']);

Route::middleware('auth:sanctum', 'rol:admin,consulta')->group(function () {
    foreach (glob(__DIR__ . '/modules/*.php') as $filename) {
        require $filename;
    }
});
