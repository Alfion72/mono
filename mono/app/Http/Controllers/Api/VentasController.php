<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){
        $ventas = Venta:: where ('ativo', 1)->get();
        $list = [];

        foreach($ventas as $venta){

            $objeto = [
                'id' => $venta->id,
                'cliente_id' => $venta->cliente_id,
                'mono_id' => $venta->mono_id,
                'registrado' => $venta->created_at->format('d-m-Y')
            ];

            array_push($list, $objeto);
        }
        return response()->json($list);
    }

    public function item($id){
        $venta = Venta::where('id', '=', $id)->first();
        
        if($venta){
        
            $objeto = [
                'id' => $venta->id,
                'cliente_id' => $venta->cliente_id,
                'mono_id' => $venta->mono_id,
                'registrado' => $venta->created_at->format('d-m-Y'),
                'saludo' => 'hola'
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => 404,
                'mensaje' => 'No se encontro la venta'
            ];

            return response()->json($objeto);
        }
    }

    public function create(Request $request){
        $data = $request->validate([
            'cliente_id' => 'required|string',
            'mono_id' => 'required|string'
        ]);

        $venta = Venta::create([
            'cliente_id' => $data['cliente_id'],
            'mono_id' => $data['mono_id']
        ]);

        if($venta){
            $objeto = [
                'code' => "200",
                'mensaje' => 'venta creado con exito',
                'venta' => $venta
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al crear la venta, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'id' => 'required|integer',
            'cliente_id' => 'required|integer',
            'mono_id' => 'required|integer'
        ]);

        $venta = Venta::where('id', '=', $id)->first();

        if($venta){
            $venta->update([
                
                'cliente_id' => $data['cliente_id'],
                'mono_id' => $data['mono_id']
            ]);
            $objeto = [
                'code' => "200",
                'mensaje' => 'venta actualizado con exito',
                'venta' => $venta
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al actualizar la venta, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function delete($id){
        $venta = Venta::where('id', '=', $id)->first();
        if($venta){
            $venta->ativo = 0;
            $venta->save();
            $objeto = [
                'code' => "200",
                'mensaje' => 'venta eliminada con exito',
                'venta' => $venta
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al eliminar la venta, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

}
