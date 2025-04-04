@extends('layouts.main')

@section("tab-title", "Detalles - Agregar")

@section("title")
<i class="fa fa-tag me-2"></i>Detalles - Agregar
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('detalles') }}">Detalles</a></li>
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
                <form action="{{ route('detalles.store') }}" method="POST">
                    @csrf
                    <label>Venta_id</label>
                    <input type="text" name="venta_id" class="form-control my-2" required>
                    <label>Moño_id</label>
                    <input type="text" name="mono_id" class="form-control my-2" required>
                    <label>Cantidad</label>
                    <input type="text" name="cantidad" class="form-control my-2" required>
                    <label>Total</label>
                    <input type="text" name="total" class="form-control my-2" required>                    
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection