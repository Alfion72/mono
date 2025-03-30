<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function index(){
        $ventas = Venta:: where ('ativo', '=', 1)->get();

        return view('ventas.index', compact('ventas'));
    }

    public function item($id){
        $venta = Venta::where('id', '=', $id)->first();

        return view('ventas.item', compact('venta'));
    }

    public function agregar(){
        return view('ventas.agregar');
    }

    public function store( Request $request){
        $data = $request->validate([
            'cliente_id' => 'required|integer',
            'mono_id' => 'required|integer',
        ],[
            'cliente_id.required' => 'favor de escribir el id del cliente',
            'mono_id.required' => 'favor de escribir el id del mono'
        ]);

        Venta::create([
            'cliente_id' => $data['cliente_id'],
            'mono_id' => $data['mono_id']
        ]);

        return redirect()->route('ventas');
    }


}
