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
                <td>{{$detalle->venta->id}}</td>
                <td>{{$detalle->mono->nombre}}</td>
                <td>{{$detalle->cantidad}}</td>
                <td>{{$detalle->total}}</td>
                <td>{{$detalle->created_at}}</td>
                <td>
                <a href=" {{ route('detalles.item', $detalle->id) }} " class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href=" {{ route('detalles.editar', $detalle->id) }} " class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$detalle->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection


@section('modales')
	@foreach($detalles as $detalle)
		<div class="modal fade" id="exampleModal{{ $detalle->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" action="{{ route('detalles.eliminar') }}">
						@csrf
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea dar de baja el detalle?</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>El detalle <strong>{{ $detalle->id }}</strong> realizado el <strong>{{ $detalle->created_at->format('d-m-Y') }}</strong> será dado de baja</h4>

							<input type="hidden" name="detalle_id" value="{{ $detalle->id }}">
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


