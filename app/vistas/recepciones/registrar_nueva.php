<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CONTACTS -->

<section class="recepcion">
	<div class="col-md-12"><h2>Recepción del café</h2></div>
	<div class="container " >
		<div class="recep-cont col-md-12">
			<div class="recep-legend col-md-6">
				<div class="top-title">Para realizar la recepción del café, ingrese el número de documento del cliente. </div>
				<label>Si el cliente no esta registrado</label><a href="<?php echo RUTA_URL;?>/Cliente/crear_mostrar_formulario"> Has clic aqui</a>.
			</div>
			<div class="col-md-6" style="background-color: #f5f2eb" >
				<div class="col-md-11" style="background-color: #f5f2eb">
					<form class="subs-form" action="<?php echo RUTA_URL;?>/Recepciones/registrar_consultar" method="POST" > 
						<input class="contact-input" type="text" placeholder="Número de documento" name="documentoIdentidad" value="" required />
						<span ><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>  
						<input value="Consultar"  type="submit" />
					</form>
					<div style="padding: 20px">
						<a href="<?php echo RUTA_URL;?>/Recepciones/index" class="btn btn-bordered">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 