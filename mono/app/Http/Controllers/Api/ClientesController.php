<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente:: where('ativo', 1)->get();
        $list = [];

        foreach($clientes as $cliente){

            $objeto = [
                'id' => $cliente->id,
                'nombre' => $cliente->nombre,
                'domicilio' => $cliente->domicilio,
                'telefono' => $cliente->telefono,
                'registrado' => $cliente->created_at,
                'saludo' => 'hola'
            ];

            array_push($list, $objeto);
        }
        return response()->json($list);
        
    }

    public function item($id){
        $cliente = Cliente::where('id', '=', $id)->first();
        
        if($cliente){
        
            $objeto = [
                'id' => $cliente->id,
                'nombre' => $cliente->nombre,
                'domicilio' => $cliente->domicilio,
                'telefono' => $cliente->telefono,
                'registrado' => $cliente->created_at->format('d-m-Y'),
                'saludo' => 'hola'
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => 404,
                'mensaje' => 'No se encontro el cliente'
            ];

            return response()->json($objeto);
        }
    }


    public function create(Request $request){
        $data = $request->validate([
            'nombre' => 'required|string',
            'domicilio' => 'required|string',
            'telefono' => 'required|integer'
        ]);

        $cliente = Cliente::create([
            'nombre' => $data['nombre'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono']
        ]);

        if($cliente){
            $objeto = [
                'code' => "200",
                'mensaje' => 'Cliente creado con exito',
                'cliente' => $cliente
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al crear el cliente, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string',
            'domicilio' => 'required|string',
            'telefono' => 'required|integer'
        ]);

        $cliente = Cliente::where('id', '=', $id)->first();

        if($cliente){
            $cliente->update([
                'nombre' => $data['nombre'],
                'domicilio' => $data['domicilio'],
                'telefono' => $data['telefono']
            ]);
            $objeto = [
                'code' => "200",
                'mensaje' => 'Cliente actualizado con exito',
                'cliente' => $cliente
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al actualizar el cliente, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function delete($id){
        $cliente = Cliente::where('id', '=', $id)->first();
        if($cliente){
            $cliente->ativo = 0;
            $cliente->save();
            $objeto = [
                'code' => "200",
                'mensaje' => 'Cliente eliminado con exito',
                'cliente' => $cliente
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al eliminar el cliente, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

}
