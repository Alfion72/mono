@extends('layouts.main')

@section("tab-title")
{{ $mono->nombre }} - Moños
@endsection

@section("title")
<i class="fas fa-star me-2"></i>mono: {{ $mono->nombre }}
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('monos') }}">Moños</a></li>
<li class="breadcrumb-item active">Moño</li>
@endsection

@section("content")


<div class="row justify-content-center">
    <div class="col-6">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{$mono->nombre}}</h5>
                <br>
                <p class="card-text"><strong>Color:</strong>{{$mono->color}}</p>
                <p class="card-text"><strong>Tamaño:</strong>{{$mono->tamano}}</p>
                <p class="card-text"><strong>Precio:</strong>{{$mono->precio}}</p>
                <a href="#" class="card-link">Modificar</a>
                <a href="#" class="card-link">Dar de baja</a>
            </div>
        </div>
    </div>
</div>

@endsection