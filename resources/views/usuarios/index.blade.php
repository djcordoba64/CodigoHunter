@extends('layout')


@section('contenido')

<h1>Lista de los Usuarios</h1>
<table width="100%" border="1">
	<thead>
		<tr>
			<th>Nombre Completo</th>
			<th>Apellido</th>
			<th>Documento</th>
			<th>Correo</th>
			<th>Numero Contacto</th>
			<th>Dirección</th>
			<th>Rol</th>
			<th>Estado</th>
			<th>Acciones</th>

		</tr>
	</thead>
	<body>
		@foreach($usuarios as $persona)
		<tr>
			<td>
			<a href="{{route('usuarios.show',$persona->id)}}">
				{{ $persona->primerNombre}}
			</a></td>			
			<td>{{ $persona->primerApellido}}</td>
			<td>{{ $persona->documentoIdentidad}}</td>
			<td>{{ $persona->numerocontacto}}</td>
			<td>{{ $persona->direccion}}</td>
			<td>{{ $persona->rol}}</td>
			<td>{{ $persona->estado}}</td>
			<td>
				<a href="{{ route('usuarios.edit', $persona->id)}}">Editar</a>
				<form style="display:inline" method="POST" action=" {{ route('usuarios.destroy', $persona->id) }}">
					{!!csrf_field()!!}
					{!!method_field('DELETE')!!}
					<button type="submit">Eliminar</button>
					
				</form>
			</td>
			
		</tr>
		@endforeach
	</body>
</table>

@stop