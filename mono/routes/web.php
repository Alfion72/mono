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

Route::post('/clientes/agregar',[ClientesController::class, 'store'])->name('clientes.store');

Route::get('/clientes/{id}', [ClientesController::class, 'item']) -> name('clientes.item');


// direccion delete

Route::get('/monos', [MonosController::class, 'index']) -> name('monos');

Route::get('/monos/agregar', [MonosController::class, 'agregar']) -> name('monos.agregar');

Route::post('/monos/agregar',[MonosController::class, 'store'])->name('monos.store');

Route::get('/monos/{id}', [MonosController::class, 'item']) -> name('monos.item');


Route::get('/ventas', [VentasController::class, 'index']) -> name('ventas');

Route::get('/ventas/agregar', [VentasController::class, 'agregar']) -> name('ventas.agregar');

Route::post('/ventas/agregar',[VentasController::class, 'store'])->name('ventas.store');

Route::get('/ventas/{id}', [VentasController::class, 'item']) -> name('ventas.item');


Route::get('/detalles', [DetallesController::class, 'index']) -> name('detalles');

Route::get('/detalles/agregar', [DetallesController::class, 'agregar']) -> name('detalles.agregar');

Route::post('/detalles/agregar',[DetallesController::class, 'store'])->name('detalles.store');

Route::get('/detalles/{id}', [DetallesController::class, 'item']) -> name('detalles.item');



//ruta compleja
//continuara...
