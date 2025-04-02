<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){
        
        $clientes = Cliente:: where ('ativo', '=', 1)->get();

        return view('clientes.index', compact('clientes'));
    }

    public function item($id){
        $cliente = Cliente::where('id', '=', $id)->first();

        return view('clientes.item', compact('cliente'));
    }

    public function editar($id){
        $cliente = Cliente::where('id', '=', $id)->first();

        return view('clientes.editar', compact('cliente'));
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|integer'
        ],[
            'nombre.required' => 'favor de escribir el nombre',
            'domicilio.required' => 'favor de escribir la direccion',
            'telefono.integer' => 'favor de escribir el telefono con numeros'
        ]);
        
        $cliente = Cliente::where('id', '=', $data['id'])->first();

            $cliente -> nombre = $data['nombre'];
            $cliente -> domicilio = $data['domicilio'];
            $cliente -> telefono = $data['telefono'];

        $cliente->save();

        return redirect()->route('clientes') ->with('success', 'Cliente actualizado');
    }

    public function agregar(){
        return view('clientes.agregar');
    }

    public function store( Request $request){
        $data = $request->validate([
            'nombre' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|integer'
        ],[
            'nombre.required' => 'favor de escribir el nombre',
            'domicilio.required' => 'favor de escribir la direccion',
            'telefono.integer' => 'favor de escribir el telefono con numeros'
        ]);

        Cliente::create([
            'nombre' => $data['nombre'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono']
        ]);

        return redirect()->route('clientes');
    }

    public function delete(Request $request){
        $data = $request->validate([
            'cliente_id' => 'required|integer'],
            [
                'cliente_id.integer' => 'favor de enviar el id unicamente'
            ]);
        $cliente = Cliente::where('id', '=', $data['cliente_id'])->where('ativo', '=', 1)->first();

        if($cliente){
            $cliente->ativo = 0;
            $cliente->save();

            return redirect()->route('clientes')->with('success', 'el Clientese ha dado de baja');
        }
        else{
            return redirect()->route('clientes')->with('danger', 'El cliente ya se encuentra dado de baja');
        }

    }

}
