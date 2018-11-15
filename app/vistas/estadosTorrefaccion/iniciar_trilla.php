<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container">
	<div class="col-md-12">
		<h2>Gestionar trazabilidad del café</h2>
	</div>
	<?php var_dump($datos) ?>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">														
				<form class="contact-form" action="<?php echo RUTA_URL;?>/EstadosTorrefaccion/" method="POST">
					<div class="row">								
						<div class="col-md-12" style="background-color:#fff">
							<h4>Proceso de trilla</h4>
							<div class="col-md-6">
								<div class="col-md-4">
									<label for="codigoCafe" class="">Código del café</label>
								</div>
								<div class="col-md-8">
									<input type="tex" name="codigoCafe" disabled value="<?php echo $datos['codigoCafe']?>">
								</div>
							</div>							
						</div>
						<div class="col-md-12 text-center">
								<input value="Siguiente" class="btn btn-lg btn-brown" type="submit"/>
						</div>
					</div>	
				</form>					
			</div>
		</div>
	</div>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 