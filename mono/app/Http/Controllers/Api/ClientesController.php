<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente:: all();
        // $clientes = Cliente:: where('activo', 1)->get();
        $list = [];

        foreach($clientes as $cliente){

            $objeto = [
                'id' => $cliente->id,
                'nombre' => $cliente->nombre,
                'domicilio' => $cliente->domicio,
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
                'domicilio' => $cliente->domicio,
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
}
