<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CONTACTS -->
<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
			<div class="row">
				<div class="col-md-12">
					<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>     
						<form class="contact-form" action="<?php echo RUTA_URL;?>/Recepciones/registrar_consultar" method="POST">
							<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
						        <label for="billing_first_name" class="">Ingrese el número de documento del cliente.<abbr class="required" title="required">*</abbr></label>
							</p>
							<div class="row">
								<div class="col-md-6">
									<input class="contact-input" type="text" placeholder="Número de documento" name="documentoIdentidad" value="" required>
								</div>
								<div class="col-md-6">
									<input value="Consultar" class="btn btn-lg btn-brown" type="submit">
								</div>
							</div>	
						</form>					
				</div>
			</div>
		</div>
</div>
	<!-- CONTACTS END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 