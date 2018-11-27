<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<?php var_dump($datos) ?>
<section class="where-buy alt">
  	<div class="container">
  		<div class="row">
  			<a href="<?php echo RUTA_URL;?>/Recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Volver</a>
  			<div class="col-md-12"><h2>Datos</h2></div> 			
				<div class="contact-left">
					<div class="col-md-3">
						<div class="item">
							<div class="title"><i class="fa fa-calendar" aria-hidden="true"></i>Fecha</div>
							<p>*<?php echo $datos['fecha']?></p>
							<div class="title"><i class="fa fa-user" aria-hidden="true"></i></div>
							<p></p>
						</div>

																		
					</div>
					<div class="col-md-3">
						<div class="item">
							<div class="title"><i class="fa fa-envelope-o" aria-hidden="true"></i>Recibo</div>
							<p></p>
						</div>
						
					</div>
					<div class="col-md-6">						
									
					</div>
				</div>
			</div>
  		</div>
  	</div>

  	
 </section>


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 