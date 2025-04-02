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

Route::post('/clientes/eliminar', [ClientesController::class, 'delete']) -> name('clientes.eliminar');

Route::get('/clientes/{id}', [ClientesController::class, 'item']) -> name('clientes.item');

Route::get('/clientes/editar/{id}', [ClientesController::class, 'editar']) -> name('clientes.editar');

Route::post('/clientes/editar/{id}', [ClientesController::class, 'update']) -> name('clientes.update');



// monos

Route::get('/monos', [MonosController::class, 'index']) -> name('monos');

Route::get('/monos/agregar', [MonosController::class, 'agregar']) -> name('monos.agregar');

Route::post('/monos/agregar',[MonosController::class, 'store'])->name('monos.store');

Route::post('/monos/eliminar', [MonosController::class, 'delete']) -> name('monos.eliminar');

Route::get('/monos/{id}', [MonosController::class, 'item']) -> name('monos.item');

Route::get('/monos/editar/{id}', [MonosController::class, 'editar']) -> name('monos.editar');

Route::post('/monos/editar/{id}', [MonosController::class, 'update']) -> name('monos.update');

// ventas
Route::get('/ventas', [VentasController::class, 'index']) -> name('ventas');

Route::get('/ventas/agregar', [VentasController::class, 'agregar']) -> name('ventas.agregar');

Route::post('/ventas/agregar',[VentasController::class, 'store'])->name('ventas.store');

Route::post('/ventas/eliminar', [VentasController::class, 'delete']) -> name('ventas.eliminar');

Route::get('/ventas/{id}', [VentasController::class, 'item']) -> name('ventas.item');

Route::get('/ventas/editar/{id}', [VentasController::class, 'editar']) -> name('ventas.editar');

Route::post('/ventas/editar/{id}', [VentasController::class, 'update']) -> name('ventas.update');

// detalles
Route::get('/detalles', [DetallesController::class, 'index']) -> name('detalles');

Route::get('/detalles/agregar', [DetallesController::class, 'agregar']) -> name('detalles.agregar');

Route::post('/detalles/agregar',[DetallesController::class, 'store'])->name('detalles.store');

Route::post('/detalles/eliminar', [DetallesController::class, 'delete']) -> name('detalles.eliminar');

Route::get('/detalles/{id}', [DetallesController::class, 'item']) -> name('detalles.item');

Route::get('/detalles/editar/{id}', [DetallesController::class, 'editar']) -> name('detalles.editar');

Route::post('/detalles/editar/{id}', [DetallesController::class, 'update']) -> name('detalles.update');



//ruta compleja
//continuara...
