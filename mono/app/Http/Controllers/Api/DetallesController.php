<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    public function index(){
        $detalles = Detalle:: where ('ativo', 1)->get();
        $list = [];

        foreach($detalles as $detalle){

            $objeto = [
                'id' => $detalle->id,
                'venta_id' => $detalle->venta_id,
                'mono_id' => $detalle->mono_id,
                'cantidad' => $detalle->cantidad,
                'total' => $detalle->total,
                'registrado' => $detalle->created_at->format('d-m-Y')
            ];

            array_push($list, $objeto);
        }
        return response()->json($list);
    }

    public function item($id){
        $detalle = Detalle::where('id', '=', $id)->first();
        
        if($detalle){
        
            $objeto = [
                'id' => $detalle->id,
                'venta_id' => $detalle->venta_id,
                'mono_id' => $detalle->mono_id,
                'cantidad' => $detalle->cantidad,
                'total' => $detalle->total,
                'registrado' => $detalle->created_at->format('d-m-Y'),
                'saludo' => 'hola'
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => 404,
                'mensaje' => 'No se encontro el detalle'
            ];

            return response()->json($objeto);
        }
    }

    public function create(Request $request){
        $data = $request->validate([
            'venta_id' => 'required|integer',
            'mono_id' => 'required|integer',
            'cantidad' => 'required|integer',
            'total' => 'required|integer'
        ]);

        $detalle = Detalle::create([
            'venta_id' => $data['venta_id'],
            'mono_id' => $data['mono_id'],
            'cantidad' => $data['cantidad'],
            'total' => $data['total']
        ]);

        if($detalle){
            $objeto = [
                'code' => "200",
                'mensaje' => 'detalle creado con exito',
                'detalle' => $detalle
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al crear el detalle, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'id' => 'required|integer',
            'venta_id' => 'required|string',
            'mono_id' => 'required|string',
            'tamano' => 'required|integer'
        ]);

        $detalle = Detalle::where('id', '=', $id)->first();

        if($detalle){
            $detalle->update([
                'venta_id' => $data['venta_id'],
                'mono_id' => $data['mono_id'],
                'tamano' => $data['tamano']
            ]);
            $objeto = [
                'code' => "200",
                'mensaje' => 'detalle actualizado con exito',
                'detalle' => $detalle
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al actualizar el detalle, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }
    
    public function delete($id){
        $detalle = Detalle::where('id', '=', $id)->first();
        if($detalle){
            $detalle->ativo = 0;
            $detalle->save();
            $objeto = [
                'code' => "200",
                'mensaje' => 'detalle eliminado con exito',
                'detalle' => $detalle
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al eliminar el detalle, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

}
