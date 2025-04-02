<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;

class DetallesController extends Controller
{
    public function index(){
        $detalles = Detalle:: where ('ativo', 1)->get();

        return view('detalles.index', compact('detalles'));
    }

    public function item($id){
        $detalle = Detalle::findOrFail($id);
        
        return view('detalles.item', compact('detalle'));
    }

    public function agregar(){
        return view('detalles.agregar');
    }

    public function store( Request $request){
        $data = $request->validate([
            'venta_id' => 'required|integer',
            'mono_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'total' => 'required|integer'
        ],[
            'venta_id.required' => 'favor de escribir el id de la venta',
            'mono_id.required' => 'favor de escribir el id del mono',
            'cantidad.required' => 'favor de escribir la cantidad',
            'total.required' => 'favor de escribir el total de la venta'
        ]);

        Detalle::create([
            'venta_id' => $data['venta_id'],
            'mono_id' => $data['mono_id'],
            'cantidad' => $data['cantidad'],
            'total' => $data['total']
        ]);

        return redirect()->route('detalles');
    }

    public function editar($id){
        $detalle = Detalle::findOrFail($id);
        
        return view('detalles.editar', compact('detalle'));
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'venta_id' => 'required|integer',
            'mono_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'total' => 'required|integer'
        ],[
            'venta_id.required' => 'favor de escribir el id de la venta',
            'mono_id.required' => 'favor de escribir el id del mono',
            'cantidad.required' => 'favor de escribir la cantidad',
            'total.required' => 'favor de escribir el total de la venta'
        ]);

        $detalle = Detalle::where('id', '=', $data['id'])->first();

            $detalle -> venta_id = $data['venta_id'];
            $detalle -> mono_id = $data['mono_id'];
            $detalle -> cantidad = $data['cantidad'];
            $detalle -> total = $data['total'];

        $detalle->save();

        return redirect()->route('detalles')->with('success', 'Detalle actualizado');
    }

    public function delete(Request $request){
        $data = $request->validate([
            'detalle_id' => 'required|integer'],
            [
                'detalle_id.integer' => 'favor de enviar el id unicamente'
            ]);
        $detalle = Detalle::where('id', '=', $data['detalle_id'])->where('ativo', '=', 1)->first();

        if($detalle){
            $detalle->ativo = 0;
            $detalle->save();

            return redirect()->route('detalles')->with('success', 'Detalle se ha dado de baja');
        }
        else{
            return redirect()->route('detalles')->with('danger', 'El detalle ya se encuentra dado de baja');
        }

    }
}
