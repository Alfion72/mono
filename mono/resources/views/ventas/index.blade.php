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
                    <a href=" {{ route('ventas.editar', $venta->id) }} " class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$venta->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('modales')
	@foreach($ventas as $venta)
		<div class="modal fade" id="exampleModal{{ $venta->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="{{ route('ventas.eliminar') }}">
						@csrf
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea dar de baja el venta?</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>La venta <strong>{{ $venta->id }}</strong> realizada a <strong>{{ $venta->cliente->nombre }}</strong> será dada de baja</h4>

							<input type="hidden" name="venta_id" value="{{ $venta->id }}">
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




