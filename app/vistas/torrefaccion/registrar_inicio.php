<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CONTACTS -->
<div class="container">
	<div class="col-md-12">
		<h2>Gestionar trazabilidad del café</h2>
	</div>
	<div class="contact-wrap">		
			<div class="row">
				<div class="col-md-12">
					<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>     
						<form class="contact-form" action="<?php echo RUTA_URL;?>/Torrefaccion/registrar_consultar_cafe" method="POST">
							<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
						        <label for="codigoCafe" class="">Ingrese el código del café<abbr class="required" title="required">*</abbr></label>
							</p>
							<div class="row">
								<div class="col-md-6">
									<input required class="contact-input" type="text" placeholder="código del café" name="codigoCafe"  value="">
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