<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\MonosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

//simple
// Route::get('/', function () {
//     return view('home');
// });

//compuesta
Route::get('/', [InicioController::class, 'index']) -> name('home');

Route::get('/clientes', [ClientesController::class, 'index']) -> name('clientes');

Route::get('/clientes/agregar', [ClientesController::class, 'agregar']) -> name('clientes.agregar');

Route::get('/clientes/{id}', [ClientesController::class, 'item']) -> name('clientes.item');

// direccion delete

Route::get('/monos', [MonosController::class, 'index']) -> name('monos');

Route::get('/monos/{id}', [MonosController::class, 'item']) -> name('monos.item');


Route::get('/ventas', [VentasController::class, 'index']) -> name('ventas');

Route::get('/ventas/{id}', [VentasController::class, 'item']) -> name('ventas.item');


Route::get('/detalles', [DetallesController::class, 'index']) -> name('detalles');

Route::get('/detalles/{id}', [DetallesController::class, 'item']) -> name('detalles.item');



//ruta compleja
//continuara...
