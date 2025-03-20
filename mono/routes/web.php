<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\MonosController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

//simple
Route::get('/', function () {
    return view('home');
});

//compuesta
Route::get('/clientes', [ClientesController::class, 'index']) -> name('clientes');

Route::get('/monos', [MonosController::class, 'index']) -> name('monos');

Route::get('/ventas', [VentasController::class, 'index']) -> name('ventas');

Route::get('/detalles', [DetallesController::class, 'index']) -> name('detalles');

//ruta compleja
//continuara...
