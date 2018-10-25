<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  
<div class="">
	<h3>Editar usuario</h3>

	<form action="<?php echo RUTA_URL;?>/Usuarios/editar/<?php echo $datos['idPersona']?>" method="POST">
		<div class="form-group">
			<p>
				<label for="primerNombre">Primer Nombre:<sub>*</sub>
					<input type="text" class="" name="primerNombre" value="<?php echo $datos['primerNombre']?>">
				</label>

				<label for="segundoNombre">Segundo Nombre:
					<input type="text" class="" name="segundoNombre" value="<?php echo $datos['segundoNombre']?>">
				</label>
			</p> 
			<p> 
				<label for="primerApellido">Primer Apellido:<sub>*</sub>
					<input type="text" class="" name="primerApellido" value="<?php echo $datos['primerApellido']?>">
				</label> 
				<label for="segundoApellido">Segundo Apellido:<sub>*</sub>
					<input type="text" class="" name="segundoApellido" value="<?php echo $datos['segundoApellido']?>">
				</label>
			</p>
			<p> 
				<label for="documentoIdentidad">Documento identidad:<sub>*</sub>
					<input type="text" class="" name="documentoIdentidad" value="<?php echo $datos['documentoIdentidad']?>">
				</label>  
				<label for="fechaNacimiento">Fecha Nacimiento:<sub>*</sub>
					<input type="date" class="" name="fechaNacimiento" value="<?php echo $datos['fechaNacimiento']?>">
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
				<label for="usuario">Usuario:<sub>*</sub>
					<input type="text" class="" name="usuario" value="<?php echo $datos['usuario']?>">
				</label>
			</p>
			<p>	
				<label for="contrasena">contrasena:<sub>*</sub>
					<input type="password" class="" name="contrasena" >
				</label>
				<label for="confi_Contrasena">Confirmar contrasena:<sub>*</sub>
					<input type="password" class="" name="confi_Contrasena">
				</label>
			</p>	
			<p>Sexo
			<ul>
				<li>
					<label>
					<input type="radio" name="sexo" value="masculino <?php  $datos['sexo']=='masculino';?>"  > Masculino
					</label>
				</li>
				<li>
					<label>
						<input type="radio" name="sexo" value="femenino <?php  $datos['sexo']=='femenino';?>"> Femenino
					</label>
				</li>
			</ul>
			
				<label for="rol">Rol
					<select name="rol">
	   					<option value="administrador" <?php  $datos['rol']=='administrador'? print "selected" : "";?> >Administrador</option>
		  				<option value="coordinador" <?php $datos['rol']=='coordinador'? print "selected" : "";?> >Coordinador</option>
		  			  	<option value="operario" <?php $datos['rol']=='operario'? print "selected" : "";?> >Operario</option>
	   					<option value="tostador" <?php $datos['rol']=='tostador'? print "selected" : "";?> >Tostador</option>
	 				 </select>
	 			</label> 
				<label for="estado">Estado
					<select name="estado">
	   					<option value="activo" <?php  $datos['estado']=='activo'? print "selected" : "";?>>Activo</option>
		  				<option value="inhativo" <?php  $datos['estado']=='inhativo'? print "selected" : "";?> >Inhactivo</option>
	 				 </select>
	 			</label>
	 			
			<p>		
			<input class="" type="submit" value="Actualizar">
			</p>	
		</div>
	</form>	
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 