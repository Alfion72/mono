@extends('layouts.main')

@section("tab-title", "Clientes")

@section("title")
Clientes
@endsection


@section("breadcrumb")
<li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
<li class="breadcrumb-item"><a href="{{ route('clientes') }}">Clientes</a></li>
<li class="breadcrumb-item active">Cliente</li>
@endsection

@section("content")

{{ $cliente }}

@endsection