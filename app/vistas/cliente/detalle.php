<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Clientes/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a> 
<h2>Información del Cliente</h2>
<p>Datos Personales</p>
<?php  echo var_dump($datos) ?>
<p>
	Nombre Completo: 
		<?php echo $datos['primerNombre']." ".$datos['segundoNombre'].' '.$datos['primerApellido'].''.$datos['segundoApellido'] ?>
	</p>
	<p>
		Documento de identidad:
		<?php echo $datos['documentoIdentidad']?>
	</p>
	<p>
		Fecha Nacimiento:
		<?php echo $datos['fechaNacimiento']?>
	</p>
	<p>
		Sexo:
		<?php echo $datos['sexo']?>
	</p>
	<p>
		correo:
		<?php echo $datos['correo']?>
	</p>
	<p>
		Número de contaçto:
		<?php echo $datos['numeroContacto']?>
	</p>
	<p>
		Estado:
		<?php echo $datos['estado']?>
	</p>
	<p>Datos de la finca</p>
	<p>
		Nombre de la finca:
		<?php echo $datos['nombreFinca']?>

	</p>
	<p>
		Temperatura:
		<?php echo $datos['Temperatura']?>

	</p>
	<p>
		Vereda:
		<?php echo $datos['vereda']?>

	</p>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 

