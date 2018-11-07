<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<section class="where-buy alt">
  	<div class="container">
  		<div class="row">
  			<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Volver</a>
  			<div class="col-md-12"><h2>Información del cliente</h2></div> 			
				<div class="contact-left">
					<div class="col-md-4">
						<div class="item">
							<div class="title"><i class="fa fa-user" aria-hidden="true"></i> Documento</div>
							<p>*<?php echo $datos['documentoIdentidad']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="fa fa-user" aria-hidden="true"></i> Nombre completo</div>
							<p>*<?php echo $datos['primerNombre']." ". $datos['segundoNombre']." ". $datos['primerApellido']." ". $datos['segundoApellido']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> Fecha nacimiento</div>
							<p>*<?php echo $datos['fechaNacimiento']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Sexo</div>
							<p>*<?php echo $datos['sexo']?></p>
						</div>
																		
					</div>
					<div class="col-md-8">
						<div class="item">
							<div class="title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo</div>
							<p>*<?php echo $datos['correo']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="fa fa-phone" aria-hidden="true"></i> Número de contácto</div>
							<p>*<?php echo $datos['numeroContacto']?> </p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> Dirección</div>
							<p>*<?php echo $datos['direccion']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-retweet" aria-hidden="true"></i> Estado</div>
							<p>*<?php echo $datos['estado']?></p>
						</div>
					
				</div>
			</div>
  		</div>
  	</div>
  </section>


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 
