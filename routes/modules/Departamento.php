<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;

Route::group(['prefix'=>'departamento', 'middleware' => ['auth:sanctum', 'rol:admin,consulta']], function(){
    Route::get('/get', [DepartamentoController::class, 'show']);
    Route::get('/search/{name}', [DepartamentoController::class, 'searchBy']);
});