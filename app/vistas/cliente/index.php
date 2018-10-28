<?php require RUTA_APP . '/vistas/inc/header.php' ?>  
<a href="<?php echo RUTA_URL;?>/paginas" class="btn btn-light"><i class="fa fa-backward"></i>Salir</a>
<h1>Lista de los Clientes</h1>
	<table width="100%" border="1">
		<thead>
			<tr>
				<th>Documento</th>
				<th>Nombre Completo</th>
				<th>Apellidos</th>
				<th>Correo</th>
				<th>Numero de contácto</th>
				<th>Dirección</th>
				<th>Estado</th>
				<th>Acciones</th>


				
			</tr>
		</thead>
		<body>	
			<?php foreach($datos['personas']  as $usuario): ?>
			<tr>
				<td>					
					<?php echo $usuario->documentoIdentidad;?>								
				</td>
			
				<td>
					<a href="<?php echo RUTA_URL;?>/Cliente/detalle/<?php echo $usuario->idPersona;?>">
						<?php echo $usuario->primerNombre;?>
						<?php echo $usuario->segundoNombre;?>
					</a>
				</td>
			
				<td>
					<?php echo $usuario->primerApellido;?>
					<?php echo $usuario->segundoApellido;?>
				</td>
				<td>
					<?php echo $usuario->correo;?>				
				</td>
				<td>
					<?php echo $usuario->numeroContacto;?>				
				</td>
				<td>
					<?php echo $usuario->direccion;?>				
				</td>
				<td>
					<?php echo $usuario->estado;?>				
				</td>
				<td>
					<a href="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $usuario->idPersona;?>">Editar</a>				
				</td>

			</tr>
														
					
			<?php endforeach;?>
		</body>
	</table>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 