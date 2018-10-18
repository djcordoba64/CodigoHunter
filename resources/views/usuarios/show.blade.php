@extends('layout')


@section('contenido')

	<h1>Usuario</h1>
	<p>Nombre completo:{{ $usuario->primerNombre}} - 
		{{ $usuario->sergundoNombre}}-
		{{ $usuario->primerApellido}}-
		{{ $usuario->segundoApellido}}
	</p>
	<p>Número de documento: {{ $usuario->documentoIdentidad }}</p>
	<p>Correo: {{ $usuario->correo}}</p>
	<p>Número de contacto: {{ $usuario->numeroContacto}}</p>
	<p>Dirección: {{ $usuario->direccion}}</p>

@stop



