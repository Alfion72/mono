<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mono;
use Illuminate\Http\Request;

class MonosController extends Controller
{
    public function index(){
        $monos = Mono:: where ('ativo', 1)->get();
        $list = [];

        foreach($monos as $mono){

            $objeto = [
                'id' => $mono->id,
                'nombre' => $mono->nombre,
                'color' => $mono->color,
                'tamano' => $mono->tamano,
                'precio' => $mono->precio,
                'registrado' => $mono->created_at->format('d-m-Y'),
                'mensaje' => 'hola muy buenas, ¿que vamos a comer? :)'
            ];

            array_push($list, $objeto);
        }
        return response()->json($list);
    }

    public function item($id){
        $mono = Mono::where('id', '=', $id)->first();
        
        if($mono){
        
            $objeto = [
                'id' => $mono->id,
                'nombre' => $mono->nombre,
                'color' => $mono->color,
                'tamano' => $mono->tamano,
                'precio' => $mono->precio,
                'registrado' => $mono->created_at->format('d-m-Y'),
                'saludo' => 'hola'
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => 404,
                'mensaje' => 'No se encontro el mono'
            ];

            return response()->json($objeto);
        }
    }

    public function create(Request $request){
        $data = $request->validate([
            'nombre' => 'required|string',
            'color' => 'required|string',
            'tamano' => 'required|string',
            'precio' => 'required|integer'
        ]);

        $mono = Mono::create([
            'nombre' => $data['nombre'],
            'color' => $data['color'],
            'tamano' => $data['tamano'],
            'precio' => $data['precio']
        ]);

        if($mono){
            $objeto = [
                'code' => "200",
                'mensaje' => 'mono creado con exito',
                'mono' => $mono
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al crear el moño, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|string',
            'color' => 'required|string',
            'tamano' => 'required|integer',
            'precio' => 'required|integer'
        ]);

        $mono = Mono::where('id', '=', $id)->first();

        if($mono){
            $mono->update([
                'nombre' => $data['nombre'],
                'color' => $data['color'],
                'tamano' => $data['tamano'],
                'precio' => $data['precio']
            ]);
            $objeto = [
                'code' => "200",
                'mensaje' => 'mono actualizado con exito',
                'mono' => $mono
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al actualizar el moño, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

    public function delete($id){
        $mono = Mono::where('id', '=', $id)->first();
        if($mono){
            $mono->ativo = 0;
            $mono->save();
            $objeto = [
                'code' => "200",
                'mensaje' => 'moño eliminado con exito',
                'mono' => $mono
            ];
            return response()->json($objeto);
        }
        else{
            $objeto = [
                'code' => '500',
                'mensaje' => 'Error al eliminar el moño, favor de verificar los datos'
            ];
            return response()->json($objeto);
        }
    }

}
