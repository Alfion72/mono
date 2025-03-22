@extends('layouts.main')

@section("tab-title", "Detalles")

@section("title")
Detalles
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Detalles</li>
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
            <th>| |</th>
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
                <td>{{$detalle->created_at}}</td></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

