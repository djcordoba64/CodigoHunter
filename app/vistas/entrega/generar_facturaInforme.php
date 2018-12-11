<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<?php var_dump($datos) ?>
<!-- TESTIMONIALS -->
	<section class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Información</h2>
				</div>
				<div class="col-md-12 testimonials-list">
					<div class="review-item">
						<div class="img-wrap"><img src="images/review-ava.jpg" alt=""></div>
			    		<h5 class="name">Descripción</h5>
			    		<div class="col-md-4">
			    		<p><label>Recibo: </label><span> <?php echo $datos['numeroRecibo']?></span></p>
			    		<p><label>Fecha:  </label><span> <?php echo $datos['fecha']?></span></p>
			    		</div>
			    		<div class="col-md-4">
			    		 <blockquote>
			    		 	<p><label>Caficultor: </label><span> <?php echo $datos['primerNombre'].' '.$datos['primerApellido'] ?></span></p>
			    			<p><label>Documento: </label><span> <?php echo $datos['documentoIdentidad']?></span></p>
			    		 </blockquote>
			    		</div>
			    		<div class="col-md-4">
			    		 <blockquote>
			    		 	<?php foreach($datos['lotes']  as $cafes): ?>
			    		 	<p><label>Lote: </label><span><?php echo $cafes->codigoCafe;?></span></p>
			    		 	<?php endforeach;?>
			    		 </blockquote>
			    		</div>
			    	</div>
			    
				</div>
				<div class="col-md-12">
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- TESTIMONIALS END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>