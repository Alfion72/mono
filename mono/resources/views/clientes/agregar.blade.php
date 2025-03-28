@extends('layouts.main')

@section("tab-title", "Clientes - Agregar")

@section("title")
<i class="fa fa-user"></i>Clientes - Agregar
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Agregar</li>
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card" >
            <div class="card-body">
                <form>
                    <label>Nombre</label>
                    <input type="" name="nombre" class="form-control my-2">
                    <label>Domicilio</label>
                    <input type="" name="domicio" class="form-control my-2">
                    <label>Telefono</label>
                    <input type="" name="telefono" class="form-control my-2">
                    
                    <button>Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection