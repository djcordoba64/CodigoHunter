@extends('layout')


@section('contenido')

<h1>Lista de los Usuarios</h1>
<table width="100%" border="1">
	<thead>
		<tr>
			<th>Documento</th>
			<th>Nombre Completo</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Contacto</th>
			<th>Dirección</th>
			<th>Rol</th>
			<th>Estado</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<body>
		@foreach($usuarios as $usuario)
		<tr>
			<td>
				{{ $usuario->documentoIdentidad}}
			</td>
			<a href="{{route('usuarios.show',$usuario->id)}}">
				<td>
					{{ $usuario->primerNombre}}
					{{ $usuario->segundoNombre}}
				</td>
			</a>
			<td>
				{{ $usuario->primerApellido}}
				{{ $usuario->segundoApellido}}
			</td>
			<td>
				{{ $usuario->correo}}
			</td>
			<td>
				{{ $usuario->numeroContacto}}
			</td>
			<td>
				{{ $usuario->direccion}}
			</td>
			<td>
				{{ $usuario->rol}}
			</td>

			<td>
				{{ $usuario->estado}}
			</td>
			<th><a>Editar</a></th>													
		</tr>
		@endforeach
	</body>
</table>

@endsection