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
        @if($errors->any())
            <div class="card text-bg-danger mb-3">
                <div class="card-header">Advertencia</div>
                <div class="card-body">
                    <h5 class="card-title">Se encontraron los siguientes errores:</h5>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="card" >

            <div class="card-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control my-2" required>
                    <label>Domicilio</label>
                    <input type="text" name="domicilio" class="form-control my-2" required>
                    <label>Telefono</label>
                    <input type="text" name="telefono" class="form-control my-2" required>
                    
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection