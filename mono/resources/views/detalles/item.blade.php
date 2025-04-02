@extends('layouts.main')

@section("tab-title")
{{ $detalle->id }} - Detalles
@endsection

@section("title")
<i class="fas fa-tag me-2"></i>Detalle {{ $detalle->id }}
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
<li class="breadcrumb-item active">Detalle</li>
@endsection

@section("content")


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">Detalle {{$detalle->id}}</h5>
                <br>
                <p class="card-text"><strong>Venta:</strong> {{$detalle->venta_id}}</p>
                <p class="card-text"><strong>Moño:</strong> {{$detalle->mono->nombre}}</p>
                <p class="card-text"><strong>cantidad:</strong> {{$detalle->cantidad}}</p>
                <p class="card-text"><strong>Total:</strong> {{$detalle->total}}</p>
                <a href="{{ route('detalles.editar', $detalle->id) }}" class="card-link">Modificar</a>
                <a href="{{ route('detalles.eliminar', $detalle->id) }}" class="card-link">Dar de baja</a>
            </div>
        </div>
    </div>
</div>

@endsection