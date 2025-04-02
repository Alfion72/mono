@extends('layouts.main')

@section("tab-title", "Clientes")

@section("title")
Clientes
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section('action')
    <a class="btn btn-success" href="{{ route('clientes.agregar') }}"> <i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
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
                <td>{{$cliente->domicilio}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->created_at}}</td>
                <td>
                    <a href=" {{ route('clientes.item', $cliente->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href=" {{ route('clientes.editar', $cliente->id) }} " class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cliente->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection


@section('modales')
	@foreach($clientes as $cliente)
		<div class="modal fade" id="exampleModal{{ $cliente->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="{{ route('clientes.eliminar') }}">
						@csrf
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea dar de baja el cliente?</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>El cliente <strong>{{ $cliente->nombre }}</strong> con telefono <strong>{{ $cliente->telefono }}</strong> será dado de baja</h4>

							<input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
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

