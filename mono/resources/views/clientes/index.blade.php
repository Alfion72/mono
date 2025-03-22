@extends('layouts.main')

@section("tab-title", "Clientes")

@section("title")
Clientes
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section("content")

<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Telefono</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->domicio}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->created_at}}</td>
                <td>
                    <a href=" {{ route('clientes.item', $cliente->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection


