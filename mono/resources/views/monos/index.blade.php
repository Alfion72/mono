@extends('layouts.main')

@section("tab-title", "Moños")

@section("title")
Moños
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Moños</li>
@endsection


@section('action')
    <a class="btn btn-success" href="{{ route('monos.agregar') }}"> <i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
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
                    <a href=" {{ route('monos.editar', $mono->id) }} " class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$mono->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection


@section('modales')
	@foreach($monos as $mono)
		<div class="modal fade" id="exampleModal{{ $mono->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="{{ route('monos.eliminar') }}">
						@csrf
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea dar de baja el moño?</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>El moño <strong>{{ $mono->nombre }}</strong> de color <strong>{{ $mono->color }}</strong> será dado de baja</h4>

							<input type="hidden" name="mono_id" value="{{ $mono->id }}">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-success">Aceptar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endforeach
@endsection



<!-- notitas

borrado logico
php artisan make:migarte       update_table_table
$table->ineger('') -> default(0) -> after('campo'); 

-->

