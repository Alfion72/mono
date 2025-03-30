<?php

use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\DetallesController;
use App\Http\Controllers\Api\MonosController;
use App\Http\Controllers\Api\VentasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/clientes', [ClientesController::class, 'index']);

Route::post('/clientes/agregar', [ClientesController::class, 'agregar']);

Route::get('/clientes/{id}', [ClientesController::class, 'item']);



Route::get('/monos', [MonosController::class, 'index']);

Route::get('/ventas', [VentasController::class, 'index']);

Route::get('/detalles', [DetallesController::class, 'index']);