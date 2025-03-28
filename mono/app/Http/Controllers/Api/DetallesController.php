<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Detalle;
use Illuminate\Http\Request;

class DetallesController extends Controller
{
    public function index(){
        $detalles = Detalle:: all();
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
}
