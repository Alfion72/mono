<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetallesController extends Controller
{
    public function index(){
        return view('detalles');
    }
}
