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
}
