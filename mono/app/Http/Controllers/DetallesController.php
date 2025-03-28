<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;

class DetallesController extends Controller
{
    public function index(){
        $detalles = Detalle:: all();

        return view('detalles.index', compact('detalles'));
    }

    public function item($id){
        $detalle = Detalle::findOrFail($id);
        
        return view('detalles.item', compact('detalle'));
    }
}
