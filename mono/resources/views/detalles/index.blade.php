@extends('layouts.main')

@section("tab-title", "Detalles")

@section("title")
Detalles
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Detalles</li>

@endsection

@section('action')
    <a class="btn btn-success" href="{{ route('detalles.agregar') }}"> <i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
@endsection

@section("content")

<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Venta_id</th>
            <th>Moño_id</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
            <tr>
                <td>{{$detalle->id}}</td>
                <td>{{$detalle->venta_id}}</td>
                <td>{{$detalle->mono->nombre}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>{{$detalle->total}}</td>
                <td>{{$detalle->created_at}}</td>
                <td>
                <a href=" {{ route('detalles.item', $detalle->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

