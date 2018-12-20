<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<?php require RUTA_APP . '/vistas/inc/header.php' ?>

  <!-- PAGE HEAD -->
    <section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?php echo RUTA_URL;?>/paginas">Inicio</a></li>
              <li>Usuarios</li>
            </ul>
            <h1>Detalle</h1> 
          </div>
        </div>
      </div>
    </section>
  <!-- PAGE HEAD END -->

<section class="where-buy alt">
  	<div class="container">
  		<div class="row">
  			<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Volver</a>
  			<div class="col-md-12"><h2>Información del Usuario</h2></div>
	  		<div class="col-md-6"> 			
					<div class="contact-left">
						<div class="col-md-6">
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
								<div class="item">
									<div class="title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo</div>
									<p>*<?php echo $datos['correo']?></p>
								</div>												
						</div>
						<div class="col-md-6">
							<div class="item">
								<div class="title"><i class="fa fa-phone" aria-hidden="true"></i> Número de contácto</div>
								<p>*<?php echo $datos['numeroContacto']?> </p>
							</div>
							<div class="item">
								<div class="title"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> Dirección</div>
								<p>*<?php echo $datos['direccion']?></p>
							</div>
							<div class="item">
								<div class="title"><i class="glyphicon glyphicon-education" aria-hidden="true"></i> Rol</div>
								<p>*<?php echo $datos['rol']?></p>
							</div>
							<div class="item">
								<div class="title"><i class="glyphicon glyphicon-retweet" aria-hidden="true"></i> Estado</div>
								<p>*<?php echo $datos['estado']?></p>
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-6 perfil-cont">
				<div class="content-img-Perfil">
					<p >Foto</p>
					<div class="div-img-perfil" >
						<img  src="<?php echo RUTA_URL.'/images/perfiles/usuario'.$datos['idPersona'].'.jpg'?>" width="170" >
					</div>				
				</div>	
			</div>
		</div>
  	</div>
</section>




<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 