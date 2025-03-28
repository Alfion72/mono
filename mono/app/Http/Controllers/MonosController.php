<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mono;

class MonosController extends Controller
{
    public function index(){
        $monos = Mono::all();

        return view('monos.index', compact('monos'));
    }

    public function item($id){
        $mono = Mono::where('id', '=', $id)->first();

        return view('monos.item', compact('mono'));
    }
}
