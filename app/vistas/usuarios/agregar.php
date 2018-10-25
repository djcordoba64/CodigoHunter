<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  
<div class="">
	<h3>Registrar usuario</h3>

	<form action="<?php echo RUTA_URL;?>/Usuarios/agregar" method="POST">
		<div class="form-group">
			<p>
				<label for="primerNombre">Primer Nombre:<sub>*</sub>
					<input type="text" class="" name="primerNombre">
				</label>

				<label for="segundoNombre">Segundo Nombre:
					<input type="text" class="" name="segundoNombre">
				</label>
			</p> 
			<p> 
				<label for="primerApellido">Primer Apellido:<sub>*</sub>
					<input type="text" class="" name="primerApellido">
				</label> 
				<label for="segundoApellido">Segundo Apellido:<sub>*</sub>
					<input type="text" class="" name="segundoApellido">
				</label>
			</p>
			<p> 
				<label for="documentoIdentidad">Documento identidad:<sub>*</sub>
					<input type="text" class="" name="documentoIdentidad">
				</label>  
				<label for="fechaNacimiento">Fecha Nacimiento:<sub>*</sub>
					<input type="date" class="" name="fechaNacimiento">
				</label>
			</p> 
			<p>
				<label for="correo">Correo:
					<input type="email" class="" name="correo">
				</label>
				<label for="numeroContacto">Número de contácto:
					<input type="`text" class="" name="numeroContacto">
				</label>
			</p>
			<p> 
				<label for="direccion">Dirección:<sub>*</sub>
					<input type="text" class="" name="direccion">
				</label>
				<label for="usuario">Usuario:<sub>*</sub>
					<input type="text" class="" name="usuario">
				</label>
			</p>
			<p>	
				<label for="contrasena">contrasena:<sub>*</sub>
					<input type="password" class="" name="contrasena">
				</label>
				<label for="confi_Contrasena">contrasena:<sub>*</sub>
					<input type="password" class="" name="confi_Contrasena">
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
						<input type="radio" name="sexo" value="femenino">Femenino
					</label>
				</li>
			</ul>
			
				<label for="rol">Rol
					<select name="rol">
	   					<option value="administrador">Administrador</option>
		  				<option value="coordinador">Coordinador</option>
		  			  	<option value="operario")}}">Operario</option>
	   					<option value="tostador">Tostador</option>
	 				 </select>
	 			</label> 
				<label for="estado">Estado
					<select name="estado">
	   					<option value="activo">Activo</option>
		  				<option value="inhativo">Inhactivo</option>
	 				 </select>
	 			</label>
	 			
			<p>		
			<input class="" type="submit" value="Agregar usuario">
			</p>	
		</div>
	</form>	
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 