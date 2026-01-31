<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum', 'rol:admin,consulta')->group(function () {
    foreach (glob(__DIR__ . '/modules/*.php') as $filename) {
        require $filename;
    }
});
