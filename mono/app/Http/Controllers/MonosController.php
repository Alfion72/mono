<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonosController extends Controller
{
    public function index(){
        return view('monos');
    }
}
