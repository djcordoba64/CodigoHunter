<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Cliente/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  
<div class="">
	<h3>Datos personales</h3>

	<form action="<?php echo RUTA_URL;?>/Cliente/crear" method="POST">
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
			</p>	
			<p>Sexo
			<ul>
				<li>
					<label>
					<input type="radio" name="sexo" value="Masculino">Masculino
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="sexo" value="Femenino">Femenino
					</label>
				</li>
			</ul>
			<label for="estado">Estado
					<select name="estado">
	   					<option value="Activo">Activo</option>
		  				<option value="Inactivo">Inactivo</option>
	 				 </select>
	 		</label>
	 			
			<p>		
			<input class="" type="submit" value="Agregar usuario">
			</p>				
		</div>
	</form>	
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 