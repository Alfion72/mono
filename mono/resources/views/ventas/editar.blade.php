@extends('layouts.main')

@section("tab-title", "Ventas - Editar")

@section("title")
<i class="fa fa-dollar"></i>Ventas - Editar
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('ventas') }}">Ventas</a></li>
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
                <form action="{{ route('ventas.update', $venta-> id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $venta->id }}">
                    <label>Cliente_id</label>
                    <input type="text" name="cliente_id" class="form-control my-2" value="{{ $venta->cliente_id }}" required>
                    <label>Mono_id</label>
                    <input type="text" name="mono_id" class="form-control my-2" value="{{ $venta->mono_id }}" required>
                    
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection