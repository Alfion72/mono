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
}
