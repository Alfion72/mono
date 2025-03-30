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
}
