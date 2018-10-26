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
				<th>Contacto</th>
				<th>Dirección</th>
				<th>Estado</th>
				<th>Acciones</th>
				
			</tr>
		</thead>
		<body>		
			<?php foreach($datos['personas']  as $cliente): ?>
				<tr>
					<td>
						<?php echo $cliente->documentoIdentidad;?>				
					</td>
					
					<td>
						<?php echo $cliente->primerNombre; ?>
						<?php echo $cliente->segundoNombre; ?>
						
					</td>
					
					<td>
						 <?php echo  $cliente->primerApellido; ?>
						<?php echo $cliente->segundoApellido; ?>
					</td>
					<td>
						 <?php echo $cliente->correo; ?>
					</td>
					<td>
						 <?php echo $cliente->numeroContacto; ?>
					</td>
					<td>
						 <?php echo $cliente->direccion; ?>
					</td>
					<td>
						 <?php echo $cliente->estado; ?>
					</td>
					
					<th><a href="<?php echo RUTA_URL;?>/Clientes/editar/<?php echo $cliente->idPersona;?>">Editar</a>
					</th>													
				</tr>
			<?php endforeach;?>
		</body>
	</table>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 