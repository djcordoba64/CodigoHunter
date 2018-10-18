@extends('layout')
@section('contenido')
<h1>Saludos a{{$nombre}}</h1>
<u>
	@forelse($consolas as $consola)
		<li>{{$consola}}</li>
	@empty
		<p>No hay consolas.</p>
	@endforelse
</u>
@stop