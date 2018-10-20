@extends('layout')

@section('contenido')
	<h1>Editar datos del usuario</h1>

	<form method="POST" action="{{ route('usuarios.update',$usuario->id)}} " >
		{!!method_field('PUT')!!}
		{!!csrf_field()!!}
		<p>
			<label for="primerNombre">Primer Nombre
				<input type="text" name="primerNombre" value="{{$usuario->primerNombre}}">
				{!! $errors->first('primernombre', '<span class=error>:message</span>')!!}

			</label> 
		</p>
		<p>
			<label for="segundoNombre">Segundo Nombre
					<input type="text" name="segundoNombre" value="{{$usuario->segundoNombre}}">
					{!! $errors->first('segundoNombre', '<span class=error>:usuario</span>')!!}

			</label> 
		</p>
		<p>
			<label for="primerApellido">Primer Apellido
				<input type="text" name="primerApellido" value="{{$usuario->primerApellido}}">
				{!! $errors->first('primerApellido', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="segundoApellido">Segundo Apellido
				<input type="text" name="segundoApellido" value="{{$usuario->segundoApellido}}">
				{!! $errors->first('segundoApellido', '<span class=error>:usuario</span>')!!}
	        </label> 
		</p>
		<p>
			<label for="documentoIdentidad">Documento de Identidad
				<input type="text" name="documentoIdentidad" value="{{$usuario->documentoIdentidad}}">
					{!! $errors->first('documentoIdentidad', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="fechaNacimiento" tipe="birth" >Fecha de Nacimiento
				<input type="date" name="fechaNacimiento" id="birth" value="{{$usuario->fechaNacimiento}}">
				{!! $errors->first('fechaNacimiento', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>Sexo
			<ul>
				<li>
					<label>
						<input type="radio" name="sexo" value="masculino">Masculino
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="sexo" value="Femenino">Femenino
					</label>
				</li>
			</ul>
		</p>
		<p>
			<label for="correo">Correo Electronico
				<input type="email" name="correo" value="{{$usuario->correo}}">
					{!! $errors->first('correo' ,'<span class=error>:message</span>')!!}
			</label>
		</p>
		<p>
			<label for="numeroContacto">Número de contacto
				<input type="text" name="numeroContacto" value="{{$usuario->numeroContacto}}">
					{!! $errors->first('numeroContacto', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="direccion">Dirección
				<input type="text" name="direccion" value="{{$usuario->dirección}}">
					{!! $errors->first('direccion', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="usuario">usuario
				<input type="text" name="usuario" value="{{$usuario->usuario}}">
					{!! $errors->first('usuario', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="contrasena">Contraseña
				<input type="password" name="contrasena" value="{{$usuario->contrasena}}">
					{!! $errors->first('contrasena', '<span class=error>:usuario</span>')!!}
			</label> 
		</p>
		<p>
			<label for="rol">Rol
				<select name="rol">
		   			<option value="administrador">Administrador</option>
			  		<option value="coordinador">Coordinador</option>
			  		<option value="operario")}}">Operario</option>
		   			<option value="tostador">Tostador</option>
		 		</select>
		 	</label> 
		</p>
		<p>
			<label for="estado">Estado
				<select name="estado">
		   			<option value="activo">Activo</option>
			  		<option value="inhativo">Inhactivo</option>
		 		</select>
		 	</label> 
		</p>
		<p>	
			<input type="submit" value="Guardar">
		</p>	
	</form>
@endsection