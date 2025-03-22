<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function index(){
        $ventas = Venta:: all();

        return view('ventas', compact('ventas'));
    }
}
