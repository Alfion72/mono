@extends('layouts.main')

@section("tab-title")
{{ $venta->id }} - ventas
@endsection

@section("title")
<i class="fas fa-dollar-sign me-2"></i>Venta: {{ $venta->cliente->nombre }}
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
<li class="breadcrumb-item active">Venta</li>
@endsection

@section("content")


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{$venta->cliente->nombre}}</h5>
                <br>
                <p class="card-text"><strong>Moño:</strong>{{$venta->mono->nombre}}</p>
                <p class="card-text"><strong>Registrado:</strong>{{$venta->created_at}}</p>
                <a href="{{ route('ventas.editar', $venta->id)}}" class="card-link">Modificar</a>
                <a href="{{ route('ventas.eliminar', $venta->id) }}" class="card-link">Dar de baja</a>
            </div>
        </div>
    </div>
</div>

@endsection