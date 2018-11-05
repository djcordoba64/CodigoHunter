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

<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a> 

	<h2>Información del usuario</h2>
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
		Rol:
		<?php echo $datos['rol']?>
	</p>
	<p>
		Estado:
		<?php echo $datos['estado']?>
	</p>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 