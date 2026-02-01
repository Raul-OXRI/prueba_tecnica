<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'rol:admin, consulta']], function () {
    // las rutas de creación y actualización
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::put('/updatepass/{id}', [UserController::class, 'updatePass']);

    // las rutas de activación y desactivación
    Route::put('/desactivar/{user}', [UserController::class, 'destroy']);
    Route::put('/activar/{user}', [UserController::class, 'activate']); 

    // las rutas de consulta
    Route::get('/', [UserController::class, 'showactivos']);
    Route::get('/inactivos', [UserController::class, 'showinactivos']);
    Route::get('/search/{name}', [UserController::class, 'searchBy']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::get('/showUser/{id}', [UserController::class, 'showUser']);
    
});