<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipioController;

Route::group(['prefix' => 'municipio', 'middleware' => ['auth:sanctum', 'rol:admin,consulta']], function () {
    Route::get('/', [MunicipioController::class, 'show']);
    Route::get('/showByid/{id}', [MunicipioController::class, 'showByid']);
    Route::get('/showmuni/{id}', [MunicipioController::class, 'showmuni']);
    Route::get('/search/{name}', [MunicipioController::class, 'searchBy']);
});