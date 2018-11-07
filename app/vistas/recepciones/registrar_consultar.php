<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CONTACTS -->

<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
			<div class="row">
				<div class="col-md-12">
						<div class="col-md-12">
							<h3>Datos del cliente</h3>
						</div>
						<form class="contact-form" action="<?php echo RUTA_URL;?>/Recepciones/registrar_consultar" method="POST">
							<div class="row">
								<div class="col-md-5">

									<p>
									<label for="" class="">Nombre completo:</label>
									<input class="contact-input" type="text"  name="nombreCompleto" disabled="nombreCompleto" value="<?php echo $datos['primerNombre'].' '. $datos['segundoNombre'].' '.$datos['primerApellido'].' '.$datos['segundoApellido'] ?>">
									</p>
									<p>
									<label for="" class="">Correo:</label>
									<input class="contact-input" type="text"  name="correo" value="<?php echo $datos['correo']?>">
									<p>
									<p>
									<label for="" class="">Dirección:</label>
									<input class="contact-input" type="text"  name="direccion" value="<?php echo $datos['direccion']?>">
									<p>
								</div>
								<div class="col-md-7">
									<p>
									<label for="" class="">Documento Identidad:</label>
									<input class="contact-input" type="text" disabled="documentoIdentidad" name="documentoIdentidad" value="<?php echo $datos['documentoIdentidad']?>">
									</p>
									<p>
									<label for="" class="">Número de contácto:</label>
									<input class="contact-input" type="text"  name="numeroContacto" value="<?php echo $datos['numeroContacto']?>">
									</p>
									<p>
									<label for="" class="">Seleccione una finca:</label></p>
									<p>
									<select name="finca" id="finca" style="width: 80%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
									   	<option value="0">Seleccione..
									    </option>
									</select>																	
									</p>
								</div>

								<div class="col-md-12 text-center">
									<input value="Siguiente" class="btn btn-lg btn-brown" type="submit">
								</div>
							</div>
								
						</form>					
				</div>
			</div>
		</div>
</div>
	

	<!-- CONTACTS END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 