<?php require RUTA_APP . '/vistas/inc/header.php' ?>


<!-- PRODUCT --> 
	<section class="product-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo RUTA_URL;?>/recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
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
				<div class="col-md-12" >
					<div class="cart-wrap" id="mostrarRecibo" style="display:none;">
							<div class="receipt-main">
							<div class="col-md-12">
								<div class="col-md-6">
	  								<img src="<?php echo RUTA_URL.'/images/logo.jpg'?>" 
	  							 width="100" height="100" >
	  							</div>
								<div class="col-md-6">
									<div  class="receipt-info">
									   <div class="item">Isabel vega</div>
									   <div class="item">Regimen simplificado</div>
									    <div class="item">Rut: 32.244.418-8</div>
									    <div class="item">Calle 10 sur N° 50 FF 120</div>
									    <div class="item">Celular: 321478587</div>
									   <div class="item">Medellín-Antioquía</div>
							 		</div>
							 	</div>
	  						</div>	
	  						<p class="receipt-title">RECEPCIÓN DE CAFÉ EN PLANTA</p>
	  						<div align="pull-right">					  						  
							  <div class="receipt-section pull-left">
							    <span class="receipt-label text-large">	FECHA:</span>
							    <span class="text-large"><?php echo $datos['fecha'] ?></span>
							  </div>
							  
							  <div class="pull-right receipt-section">
							    <span class="text-large receipt-label">CONSECUTIVO: </span>
							    <span class="text-consecutivo">N°. <?php echo $datos['numeroRecibo'] ?></span>
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
							</div>
							   						  
							 <div class="pull-right receipt-section">
							    <span class="text-large receipt-label">**MAQUILA PARA TRILLA Y TUESTE**</span>
							    <input type="checkbox" disabled checked>
							  </div><br>
							  <div class="clearfix"></div>
							 <div class="col-xs-9 text-page" >
							 	
							    <table class="table table-bordered">
							    	<thead>
							    		<tr>
								    		
								    		<th style="font-size:14px;text-align: center;color: #fff " colspan="4">Descripción</th>
								    		<th style="font-size:14px;text-align: center;color: #fff"  colspan="7">Forma de entrega</th>
							    		</tr>

							    		
							    	</thead>
							    		<tr >
								    		
								    		<th style="font-size:10px;text-align: center" ROWSPAN=2>Lote</th>
								    		<th style="font-size:10px;text-align: center" ROWSPAN=2>Peso</th>
								    		<th style="font-size:10px;text-align: center" ROWSPAN=2>Humedad</th>
								    		<th style="font-size:10px;text-align: center" ROWSPAN=2>Tostion</th>
								    		<th style="font-size:10px;text-align: center" colspan="3">Molida</th>
								    		<th style="font-size:10px;text-align: center" colspan="3">Gano</th>
								    		<th style="font-size:10px;text-align: center"  ROWSPAN=2>Agranel</th>
							    		</tr>

							    		<tr>
								    		
								    		<th style="font-size:10px" >Lb</th>
								    		<th style="font-size:10px" >1/2 Lb</th>
								    		<th style="font-size:10px" >5 Lb</th>
								    		<th style="font-size:10px" >Lb</th>
								    		<th style="font-size:10px" >1/2 Lb</th>
								    		<th style="font-size:10px" >5 Lb</th>
								    	
							    		</tr>
							    	<tbody>
							    		<?php foreach($datos['lotes']  as $cafe): ?>
							    		<tr>					
							                
							                <td style="font-size:12px" scope="row"><?php echo $cafe->codigoCafe?></td>
							                <td style="font-size:12px"><?php echo $cafe->peso?></td>
							                <td style="font-size:12px"><?php echo $cafe->porcentajeHumedad?></td>
							                <td style="font-size:12px"><?php echo $cafe->tipoTueste?></td>
							                <td style="font-size:12px"><?php echo $cafe->molidaLibra?> </td>
							                <td style="font-size:12px"><?php echo $cafe->molidaMediaLibra?></td>
							                <td style="font-size:12px"><?php echo $cafe->molidaCincoLibras?> </td>
							                <td style="font-size:12px"><?php echo $cafe->granoLibra?> </td>
							                <td style="font-size:12px"><?php echo $cafe->granoMediaLibra?> </td>
							                <td style="font-size:12px"><?php echo $cafe->granoCincoLibras?> </td>
							                <td style="font-size:12px"><?php echo $cafe->agranel?></td>
			            				</tr>
			            				<?php endforeach;?>
							    		
							    	</tbody>
							    </table>
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
				</div >
				<!-- RECIBO--> 
			</div>
		</div>
	</section>
	<!-- PRODUCT END -->

        
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 