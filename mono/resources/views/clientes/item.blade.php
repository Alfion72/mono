@extends('layouts.main')

@section("tab-title")
{{ $cliente->nombre }} - Clientes
@endsection

@section("title")
<i class="fas fa-user me-2"></i>Cliente: {{ $cliente->nombre }}
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Cliente</li>
@endsection

@section("content")


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{$cliente->nombre}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$cliente->telefono}}</h6>
                <p class="card-text"><strong>Domicilio:</strong>{{$cliente->domicilio}}</p>
                <a href="{{ route('clientes.editar', $cliente->id) }}" class="card-link">Modificar</a>
                <a href="{{ route('clientes.eliminar', $cliente->id) }}" class="card-link">Dar de baja</a>
            </div>
        </div>
    </div>
</div>

@endsection