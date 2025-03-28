@extends('layouts.main')

@section("tab-title", "Moños")

@section("title")
Moños
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Moños</li>
@endsection

@section("content")

<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Tamaño</th>
            <th>Precio</th>
            <th>Registrado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($monos as $mono)
            <tr>
                <td>{{$mono->id}}</td>
                <td>{{$mono->nombre}}</td>
                <td>{{$mono->color}}</td>
                <td>{{$mono->tamano}}</td>
                <td>{{$mono->precio}}</td>
                <td>{{$mono->created_at}}</td>
                <td>
                <a href=" {{ route('monos.item', $mono->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

<!-- notitas

borrado logico
php artisan make:migarte       update_table_table
$table->ineger('') -> default(0) -> after('campo'); 

-->

