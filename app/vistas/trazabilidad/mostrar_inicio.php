<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- TESTIMONIALS -->
	<section class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Consultar la trazabilidad de Torrefacción del café</h2>
				</div>
				<div class="col-md-8 col-md-offset-2 testimonials-list">
					<div class="review-item">
						<div class="quote">			
							<i class="glyphicon glyphicon-thumbs-up"><p  style="color: #EBDFC5; font-size:40px">Bienvenido!</p></i>
						</div>
			    		<p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar tellus eget magna aliquet ultricies. Praesent gravida hendrerit ex, nec eleifend sem convallis vitae. Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. </p>
			    		
			    		<button class="btn btn-default" id="IngresarMostrar" >Ingresar</button>
			    	</div>
			    	<div class="review-item" id="opcionValidarRecibo" style="display:none;">	  
			            <div class="well well-sm" style="background: #f5f2eb">
			                <form class="form-horizontal" action="<?php echo RUTA_URL;?>/Trazabilidad/validar_numeroRecibo" method="POST">  
			                    <fieldset>
			                        <legend class="text-center header">*Ingrese el número del recibo</legend>

			                        <div class="form-group">
			                            <div class="col-md-7">
			                                <input required name="numero" type="text"  class="form-control" placeholder="Número del recibo"  value=""><br>

			                                <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
			                            </div>
			                            <div class="col-md-5" align="left">
			                               <input value="Consultar" class="btn btn-brown" type="submit">
			                            </div>
			                        </div>
			                    </fieldset>
			                </form>
			            </div>
			    	</div>
				</div>				
			</div>
		</div>
	</section>
	<!-- TESTIMONIALS END -->

	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 