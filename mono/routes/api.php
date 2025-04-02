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

Route::post('/clientes/agregar', [ClientesController::class, 'create']);

Route::get('/clientes/{id}', [ClientesController::class, 'item']);

Route::post('/clientes/editar/{id}', [ClientesController::class, 'update']);

Route::post('/clientes/eliminar/{id}', [ClientesController::class, 'delete']);



Route::get('/monos', [MonosController::class, 'index']);

Route::post('/monos/agregar', [MonosController::class, 'create']);

Route::get('/monos/{id}', [MonosController::class, 'item']);

Route::post('/monos/editar/{id}', [MonosController::class, 'update']);

Route::post('/monos/eliminar/{id}', [MonosController::class, 'delete']);



Route::get('/ventas', [VentasController::class, 'index']);

Route::post('/ventas/agregar', [VentasController::class, 'create']);

Route::get('/ventas/{id}', [VentasController::class, 'item']);

Route::post('/ventas/editar/{id}', [VentasController::class, 'update']);

Route::post('/ventas/eliminar/{id}', [VentasController::class, 'delete']);



Route::get('/detalles', [DetallesController::class, 'index']);

Route::post('/detalles/agregar', [DetallesController::class, 'create']);

Route::get('/detalles/{id}', [DetallesController::class, 'item']);

Route::post('/detalles/editar/{id}', [DetallesController::class, 'update']);

Route::post('/detalles/eliminar/{id}', [DetallesController::class, 'delete']);