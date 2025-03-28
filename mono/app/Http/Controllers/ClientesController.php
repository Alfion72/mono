<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente:: all();
        // $clientes = Cliente:: where('activo', 1)->get();

        return view('clientes.index', compact('clientes'));
    }

    public function item($id){
        $cliente = Cliente::where('id', '=', $id)->first();

        return view('clientes.item', compact('cliente'));
    }

    public function agregar(){
        return view('clientes.agregar');
    }

    public function delete(Request $request){
        $data = $request->validate([
            'cliente_id' => 'required|integer'],
            [
                'cliente_id.integrer' => 'favor de enviar el id unicamente'
            ]);
        $cliente = Cliente::where('id', '=', $data['cliente_id'])->where('activo', '=', 1)->first();
    }

}
