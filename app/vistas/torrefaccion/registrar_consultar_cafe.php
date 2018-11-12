<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
	<div class="col-md-12">
		<h2>Gestion de la trazabilidad</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12" >														
				<form class="contact-form" action="<?php echo RUTA_URL;?>/Cafes/agregar_finca_seleccionada" method="POST">
					<div class="row" style="background-color:#fff">								
						<div class="col-md-4" >
							<div class="col-md-6">
								<p>
									<label for="" class="">Codigo del café:</label>
									<input class="contact-input" type="text"  name="codigoCafe" disabled="disabled" value="<?php echo $datos['codigoCafe'] ?>" />
								</p>
							</div>
							<input class="contact-input" type="submit"  name="1"  value="Iniciar Torrefacción" />
								
						</div>
					</div>	
				</form>					
			</div>
		</div>
	</div>
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 