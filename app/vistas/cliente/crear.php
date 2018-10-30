<?php require RUTA_APP . '/vistas/inc/header.php' ?>
</a>
  
<div class="">
	<h3>Clientes</h3>
	<h2>Información Personal</h2>

	<form action="<?php echo RUTA_URL;?>/Cliente/crear" method="POST">
		<div class="form-group">
			<p>
				<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
				 
      		</p>
			<p>
				<label for="primerNombre">Primer Nombre:<sub>*</sub>
					<input type="text" class="" name="primerNombre" required value="<?php echo $datos['primerNombre']?>">
				</label>

				<label for="segundoNombre">Segundo Nombre:
					<input type="text" class="" name="segundoNombre" value="<?php echo $datos['segundoNombre']?>">
				</label>
			</p> 
			<p> 
				<label for="primerApellido">Primer Apellido:<sub>*</sub>
					<input type="text" class="" name="primerApellido" required value="<?php echo $datos['primerApellido']?>">
				</label> 
				<label for="segundoApellido">Segundo Apellido:<sub>*</sub>
					<input type="text" class="" name="segundoApellido" value="<?php echo $datos['segundoApellido']?>">
				</label>
			</p>
			<p> 
				<label for="documentoIdentidad">Documento identidad:<sub>*</sub>
					<input type="text" class="" name="documentoIdentidad" required value="<?php echo $datos['documentoIdentidad']?>">
				</label>  
				<label for="fechaNacimiento">Fecha Nacimiento:<sub>*</sub>
					<input type="date" class="" name="fechaNacimiento" value="<?php echo $datos['fechaNacimiento']?>">
				</label>
			</p> 
			<p>
				<label for="correo">Correo:
					<input type="email" class="" name="correo">
				</label>
				<label for="numeroContacto">Número de contácto:
					<input type="`text" class="" name="numeroContacto" required value="<?php echo $datos['numeroContacto']?>">
				</label>
			</p>
			<p> 
				<label for="direccion">Dirección:<sub>*</sub>
					<input type="text" class="" name="direccion" value="<?php echo $datos['direccion']?>">
				</label>
			</p>	
			<p>Sexo
			<ul>
				<li>
					<label>
					<input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? 'checked':'' ?> required>Masculino
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>>Femenino
					</label>
				</li>
			</ul>
			<label for="estado">Estado
					</label>
					<select name="estado" required aria-required="true">
	   					<option value="">Seleccione</option>
	   					<option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?>>Activo</option>
	   					<option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?>>Inactivo</option>
	 				 </select>
	 		</label>
				<input type="submit" value="Siguiente">			
		</div>
	</form>	
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 