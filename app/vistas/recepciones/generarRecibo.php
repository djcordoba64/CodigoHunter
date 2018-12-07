<?php require RUTA_APP . '/vistas/inc/header.php' ?>


<!-- PRODUCT -->
<?php echo var_dump($datos) ?>
	<section class="product-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="related-title">Recepción</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="product-item">
								<div class="img-wrap"><a href="#"><img src="images/prod-img.jpg" alt=""></a></div>
								<div class="name" >Para generar el recibo de la recepción,</div>
								<div class="text">Has clic en la seguiente opción</div><br>
								<button class="btn btn-default" id="generarRecibo" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Generar recibo</button>
								
							</div>

						</div>						
					</div>
				</div>
				<!-- RECIBO --> 
				<div class="cart-wrap" id="mostrarRecibo" style="display:none;">
						<div class="receipt-main">
  
						  <p class="receipt-title">RECEPCIÓN DE CAFÉ EN PLANTA</p>
						  
						  <div class="receipt-section pull-left">
						    <span class="receipt-label text-large">	FECHA:</span>
						    <span class="text-large"><?php echo $datos['fecha'] ?></span>
						  </div>
						  
						  <div class="pull-right receipt-section">
						    <span class="text-large receipt-label">CONSECUTIVO: </span>
						    <span class="text-large"><?php echo $datos['numeroRecibo'] ?></span>
						  </div>
						  
						  <div class="clearfix"></div>
						  
						  <div class="receipt-section">
						    <span class="receipt-label">Nombre caficultor:</span>
						    <span><?php echo $datos['primerNombre'].' '.$datos['primerApellido'] ?></span>
						  </div>
						  <div class="receipt-section">
						    <span class="receipt-label">Documento:</span>
						    <span><?php echo $datos['documentoIdentidad'] ?></span>
						  </div>
						  <div class="receipt-section">
						    <span class="receipt-label">Correo:</span>
						    <span><?php echo $datos["correo"] ?></span>
						  </div>
						  
						  <div class="receipt-section">
						    <span class="receipt-label">Finca / Origen: </span>
						    <span><?php echo $datos["nombreFinca"] ?></span>
						  </div>
						  <div class="receipt-section">
						    <span class="receipt-label">Teléfono / celular: </span>
						    <span><?php echo $datos["numeroContacto"] ?></span>
						  </div>
						  <div class="receipt-section">
						     <span class="receipt-label">Dirección / municipio: </span>
						    <span><?php echo $datos["municipio"].'-'.$datos['Vereda'] ?></span>
						  </div>

						   <div class="receipt-section pull-left">
						    <span class="receipt-label text-large">	CANTIDAD ENTREGADA (Peso Gr):</span>
						    <span>201</span>gr
						    <p>HUMEDAD:</p>
						    <P>TOSTION:</P>
						  </div>						  
						  <div class="pull-right receipt-section">
						    <span class="text-large receipt-label">**MAQUILA PARA TRILLA Y TUESTE**</span>
						    <input type="checkbox" disabled checked>
						  </div>
						  <div class="clearfix"></div>
						 <div class="col-xs-6" >
						    <p class="receipt-subtitle">Forma de entrega</p>
						    <div class="col-xs-4" >
						    	<div class="receipt-section pull-left">
								    <span class="receipt-label text-large">Molida</span>
								    <p>Lb:</p>
								    <P>1/2 libra</P>
								    <P>5 libras</P>
						  		</div>
						    </div>
						    <div class="col-xs-4" >
						    	<div class="receipt-section pull-right ">
								    <span class="receipt-label text-large">Grano</span>
								    <p>Lb:</p>
								    <P>1/2 libra</P>
								    <P>5 libras</P>
						  		</div>
						    </div>
						    <div class="col-xs-4" >
						    	<div class="receipt-section pull-right ">
								    <span class="receipt-label text-large">Agranel</span>
								    <p>Lb:</p>
						  		</div>
						    </div>
						</div>						   						 												  
						  <div class="clearfix"></div>
						  
						  <div class="receipt-signature col-xs-6">
						    
						    <span class="receipt-label text-large">Firma quien entrega</span>
						    <p class="receipt-line"></p>
						    <p>--------------------------</p>
						  </div>

						  <div class="receipt-signature col-xs-6">
						  	<span class="receipt-label text-large">Firma quien recibe</span>
						    <p class="receipt-line"></p>
						    <p>--------------------------</p>
						  </div>
						</div>
				</div>
				<!-- RECIBO--> 
			</div>
		</div>
	</section>
	<!-- PRODUCT END -->


        
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 