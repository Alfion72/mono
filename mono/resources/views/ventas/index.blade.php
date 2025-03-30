@extends('layouts.main')

@section("tab-title", "Ventas")

@section("title")
Ventas
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Ventas</li>
@endsection


@section('action')
    <a class="btn btn-success" href="{{ route('ventas.agregar') }}"> <i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
@endsection

@section("content")

<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Cliente_id</th>
            <th>Mono_id</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
            <tr>
                <td>{{$venta->id}}</td>
                <td>{{$venta->cliente->nombre}}</td>
                <td>{{$venta->mono->nombre}}</td>
                <td>{{$venta->created_at}}</td>
                <td>
                <a href=" {{ route('ventas.item', $venta->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

