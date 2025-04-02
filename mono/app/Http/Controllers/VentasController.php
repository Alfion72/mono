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

    public function editar($id){
        $venta = Venta::where('id', '=', $id)->first();

        return view('ventas.editar', compact('venta'));
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'mono_id' => 'required|integer',
        ],[
            'id.required' => 'favor de escribir el id de la venta',
            'cliente_id.required' => 'favor de escribir el id del cliente',
            'mono_id.required' => 'favor de escribir el id del mono'
        ]);

        $venta = Venta::where('id', '=', $data['id'])->first();

        $venta -> cliente_id = $data['cliente_id'];
        $venta -> mono_id = $data['mono_id'];    

        $venta->save();

        return redirect()->route('ventas') ->with('success', 'Venta actualizada');
    }

    public function delete(Request $request){
        $data = $request->validate([
            'venta_id' => 'required|integer'],
            [
                'venta_id.integer' => 'favor de enviar el id unicamente'
            ]);
        $venta = Venta::where('id', '=', $data['venta_id'])->where('ativo', '=', 1)->first();

        if($venta){
            $venta->ativo = 0;
            $venta->save();

            return redirect()->route('ventas')->with('success', 'Venta dada de baja');
        }
        else{
            return redirect()->route('ventas')->with('danger', 'La venta ya se encuentra dada de baja');
        }

    }

}
