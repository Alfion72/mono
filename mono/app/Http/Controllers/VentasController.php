<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function index(){
        $ventas = Venta:: all();

        return view('ventas.index', compact('ventas'));
    }

    public function item($id){
        $venta = Venta::where('id', '=', $id)->first();

        return view('ventas.item', compact('venta'));
    }


}
