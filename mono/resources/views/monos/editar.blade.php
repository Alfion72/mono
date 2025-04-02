@extends('layouts.main')

@section("tab-title", "Moños - Editar")

@section("title")
<i class="fa fa-star mr-2"></i>Moños - Editar
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('monos') }}">Moños</a></li>
<li class="breadcrumb-item active">Editar</li>
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
                <form action="{{ route('monos.update', $mono-> id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $mono->id }}">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control my-2" value="{{ $mono->nombre }}" required>
                    <label>Color</label>
                    <input type="text" name="color" class="form-control my-2" value="{{ $mono->color }}" required>
                    <label>Tamaño</label>
                    <input type="text" name="tamano" class="form-control my-2" value="{{ $mono->tamano }}" required>
                    <label>Precio</label>
                    <input type="number" name="precio" class="form-control my-2" value="{{ $mono->precio }}" required>
                    
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection