<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mono;

class MonosController extends Controller
{
    public function index(){
        $monos = Mono:: where ('ativo', 1)->get();

        return view('monos.index', compact('monos'));
    }

    public function item($id){
        $mono = Mono::where('id', '=', $id)->first();

        return view('monos.item', compact('mono'));
    }

    public function agregar(){
        return view('monos.agregar');
    }

    public function store( Request $request){
        $data = $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'tamano' => 'required',
            'precio' => 'required'
        ],[
            'nombre.required' => 'favor de escribir el nombre',
            'color.required' => 'favor de escribir el color',
            'tamano.required' => 'favor de escribir el tamano',
            'precio.required' => 'favor de escribir el precio'
        ]);

        Mono::create([
            'nombre' => $data['nombre'],
            'color' => $data['color'],
            'tamano' => $data['tamano'],
            'precio' => $data['precio']
        ]);

        return redirect()->route('monos');
    }

    public function editar($id){
        $mono = Mono::where('id', '=', $id)->first();

        return view('monos.editar', compact('mono'));
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required',
            'color' => 'required',
            'tamano' => 'required',
            'precio' => 'required'
        ],[
            'id.integer' => 'favor de enviar el id unicamente',
            'nombre.required' => 'favor de escribir el nombre',
            'color.required' => 'favor de escribir el color',
            'tamano.required' => 'favor de escribir el tamaño',
            'precio.required' => 'favor de escribir el precio'
        ]);

        $mono = Mono::where('id', '=', $data['id'])->first();

            $mono -> nombre = $data['nombre'];
            $mono -> color = $data['color'];
            $mono -> tamano = $data['tamano'];
            $mono -> precio = $data['precio'];

        $mono->save();

        return redirect()->route('monos') ->with('success', 'Mono actualizado');
    }

    public function delete(Request $request){
        $data = $request->validate([
            'mono_id' => 'required|integer'],
            [
                'mono_id.integer' => 'favor de enviar el id unicamente'
            ]);
        $mono = Mono::where('id', '=', $data['mono_id'])->where('ativo', '=', 1)->first();

        if($mono){
            $mono->ativo = 0;
            $mono->save();

            return redirect()->route('monos')->with('success', 'Moño dado de baja');
        }
        else{
            return redirect()->route('monos')->with('danger', 'El moño ya se encuentra dado de baja');
        }

    }
}
