@extends('layouts.app')
@section('contenido')

<h1>Registro de Usuarios</h1>

@if (session()->has('info'))
	<h3>{{ session ('info')}}</h3>
@else
<form method="POST" action="{{ route('usuarios.store')}} " >
	{!!csrf_field()!!}
	<fieldset>
		<legend>Datos Personales</legend>
			<p>
			<label for="primerNombre">Primer Nombre
				<input type="text" name="primerNombre" value="{{old('primerNombre')}}">
				{!! $errors->first('primerNombre', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>

			<p>
			<label for="segundoNombre">Segundo Nombre
				<input type="text" name="segundoNombre" value="{{old('segundoNombre')}}">
				{!! $errors->first('segundoNombre', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="primerApellido">Primer Apellido
				<input type="text" name="primerApellido" value="{{old('primerApellido')}}">
				{!! $errors->first('primerApellido', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="segundoApellido">Segundo Apellido
				<input type="text" name="segundoApellido" value="{{old('segundoApellido')}}">
				{!! $errors->first('segundoApellido', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="documentoIdentidad">Documento de Identidad
				<input type="text" name="documentoIdentidad" value="{{old('documentoIdentidad')}}">
				{!! $errors->first('documentoIdentidad', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="fechaNacimiento" tipe="birth" >Fecha de Nacimiento
				<input type="date" name="fechaNacimiento" id="birth" value="{{old('fechaNacimiento')}}">
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
				<input type="email" name="correo" value="{{old('correo')}}">
				{!! $errors->first('correo' ,'<span class=error>:message</span>')!!}
			</label>
			</p>
			<p>
			<label for="numeroContacto">Número de contacto
				<input type="text" name="numeroContacto" value="{{old('numeroContacto')}}">
				{!! $errors->first('numeroContacto', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="direccion">Dirección
				<input type="text" name="direccion" value="{{old('direccion')}}">
				{!! $errors->first('direccion', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="usuario">usuario
				<input type="text" name="usuario" value="{{old('usuario')}}">
				{!! $errors->first('usuario', '<span class=error>:usuario</span>')!!}

			</label> 
			</p>
			<p>
			<label for="contrasena">Contraseña
				<input type="password" name="contrasena" value="{{old('contrasena')}}">
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
			
		</fieldset>
	<input type="submit" value="Enviar">	
</form>
@endif
@stop