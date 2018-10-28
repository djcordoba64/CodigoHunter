<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  
<div class="">
	<h3>Editar usuario</h3>

	<form action="<?php echo RUTA_URL;?>/Usuarios/editar/<?php echo $datos['idPersona']?>" method="POST">
		<div class="form-group">
			
			<p>
				<label for="primerNombre">Primer Nombre:<sub>*</sub>
					<input type="text" class="" name="primerNombre" value="<?php echo $datos['primerNombre']?>" required>
				</label>

				<label for="segundoNombre">Segundo Nombre:
					<input type="text" class="" name="segundoNombre" value="<?php echo $datos['segundoNombre']?>">
				</label>
			</p> 
			<p> 
				<label for="primerApellido">Primer Apellido:<sub>*</sub>
					<input type="text" class="" name="primerApellido" value="<?php echo $datos['primerApellido']?>"  required>
				</label> 
				<label for="segundoApellido">Segundo Apellido:<sub>*</sub>
					<input type="text" class="" name="segundoApellido" value="<?php echo $datos['segundoApellido']?>">
				</label>
			</p>
			<p> 
				<label for="documento">Documento identidad: </label> 
				<!--se deshabilita modificacion del documento de identidad-->
					<label name="documento"><?php echo $datos['documentoIdentidad']?></label>
				 
				<label for="fechaNacimiento">Fecha Nacimiento:<sub>*</sub>
					<input type="date" class="" name="fechaNacimiento" value="<?php echo $datos['fechaNacimiento']?>"  required>
				</label>
			</p> 
			<p>
				<label for="correo">Correo:
					<input type="email" class="" name="correo" value="<?php echo $datos['correo']?>">
				</label>
				<label for="numeroContacto">Número de contácto:
					<input type="`text" class="" name="numeroContacto" value="<?php echo $datos['numeroContacto']?>">
				</label>
			</p>
			<p> 
				<label for="direccion">Dirección:<sub>*</sub>
					<input type="text" class="" name="direccion" value="<?php echo $datos['direccion']?>">
				</label>
			</p>
			<p>	
				<label for="contrasena">contrasena:<sub>*</sub>
					<input type="password" class="" name="contrasena" value="<?php echo $datos['contrasena']?>"  required>
				</label>
				<label for="confi_Contrasena">Confirmar contrasena:<sub>*</sub>
					<input type="password" class="" name="confi_Contrasena" value="<?php echo $datos['confi_Contrasena']?>"  required>
				</label>
			</p>	
			<p>Sexo
			<ul>
				<li>
					<label>
					<input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? 'checked':'' ?> required> Masculino
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>> Femenino
					</label>
				</li>
			</ul>
			
				<label for="rol">Rol
	 			</label> 
						<select name="rol" required aria-required="true">
	   					<option value="">Seleccione</option>
	   					<option value="administrador" <?php  $datos['rol']=='administrador'? print "selected='selected'" : "";?> >Administrador</option>
		  				<option value="coordinador" <?php $datos['rol']=='coordinador'? print "selected='selected'" : "";?> >Coordinador</option>
		  			  	<option value="operario" <?php $datos['rol']=='operario'? print "selected='selected'" : "";?> >Operario</option>
	   					<option value="tostador" <?php $datos['rol']=='tostador'? print "selected='selected'" : "";?> >Tostador</option>
	 				 </select>
				<label for="estado">Estado
	 			</label>
					<select name="estado" required aria-required="true">
	   					<option value="">Seleccione</option>
	   					<option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?>>Activo</option>
	   					<option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?>>Inactivo</option>
	 				 </select>
	 			
			<p>		
			<input class="" type="submit" value="Actualizar">
			</p>	
		</div>
	</form>	
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 