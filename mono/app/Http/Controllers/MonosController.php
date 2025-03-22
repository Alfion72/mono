<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mono;

class MonosController extends Controller
{
    public function index(){
        $monos = Mono::all();

        return view('monos', compact('monos'));
    }
}
