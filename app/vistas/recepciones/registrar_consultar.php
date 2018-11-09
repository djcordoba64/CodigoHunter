<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CONTACTS -->

<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">														
				<form class="contact-form" action="<?php echo RUTA_URL;?>/Cafes/agregar_finca_seleccionada" method="POST">
					<div class="row">								
						<div class="col-md-6" style="background-color:#fff">
							<h4>Datos del cliente</h4>
							<div class="col-md-12">
								<p>
									<label for="" class="">Nombre completo:</label>
									<input class="contact-input" type="text"  name="nombreCompleto" disabled="disabled" value="<?php echo $datos['primerNombre'].' '. $datos['segundoNombre'].' '.$datos['primerApellido'].' '.$datos['segundoApellido'] ?>">
								</p>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Documento</label>
										<input class="contact-input" type="text" disabled="disabled" name="documentoIdentidad" value="<?php echo $datos['documentoIdentidad']?>">
									</p>
								</div>
								<div  class="col-md-6">
									<label for="" class="">Contácto</label>
										<input class="contact-input" type="text" disabled="disabled" name="numeroContacto" value="<?php echo $datos['numeroContacto']?>">											
								</div>
							</div>
								<p>
									<label for="" class="">Correo:</label>
									<input class="contact-input" type="text"  name="correo" value="<?php echo $datos['correo']?>">
								</p>
								<p>
									<label for="" class="">Dirección:</label>
									<input class="contact-input" type="text"  name="direccion" value="<?php echo $datos['direccion']?>">
								</p>
						</div>
						<div class="col-md-6">
							<div class="col-md-12" style="background-color: #fff">
								<h4 for="" class="">Lista de las fincas del cliente</h4>
									<p>Seleccione una finca: 
									<select name="fincas" id="fincas" style="width: 50%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
										   	<option value="0">Seleccione..
										    </option>
										</select>
									</p>																		
								
							</div>	
							<div class="col-md-12" id="divDetalleFinca" style="display: none; background-color: #fff">
								<h4>Datos de la finca</h4>
								<p>
									<label for="" class="">Nombre de la finca:</label>
									<input class="contact-input" type="text" disabled name="nombreFinca" id="nombreFinca">
								</p>
								<div class="col-md-6">
											<p>
											<label for="" class="">Municipio:</label>
											<input class="contact-input" type="text" disabled name="municipio" id="municipio">
											</p>											
								</div>
								<div class="col-md-6">
											<p>
											<label for="" class="">Vereda:</label>
											<input class="contact-input" type="text" disabled name="vereda" id="vereda">
											</p>											
								</div>
								<div class="col-md-5">
									<label>Temperatura promedio:</label>
										<input class="contact-input" type="number" name="Temperatura" id="Temperatura">
									

								</div>																				
							</div>								
						</div>
						<div class="col-md-12 text-center">
								<input value="Siguiente >>" class="btn btn-lg btn-brown" type="submit">
						</div>
					</div>	
				</form>					
			</div>
		</div>
	</div>
</div>
	

	<!-- CONTACTS END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 