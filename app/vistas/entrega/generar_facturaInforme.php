<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- PRODUCT --> 
	<section class="product-single">
		<div class="container">
			<div class="row">
				<!-- OPCIONES--> 
				<div class="col-md-12">
					<a href="<?php echo RUTA_URL;?>/Entrega/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
					<h2 class="related-title">Facturación</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="product-item">								
								<div class="name" >Para generar la factura de entrega o el informe del proceso de torrefacción.</div>
								<div class="text">Has clic en una de las  seguientes opciones.</div><br>
								<button class="btn btn-default" id="generarFactura" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Generar factura</button>
								<button class="btn btn-default" id="generarInforme" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Generar informe</button>
								
							</div>

						</div>						
					</div>
				</div>
				<!-- OPCIONES--> 
				<!-- FACTURA--> 				
				<div class="cart-wrap" id="mostrarFactura" style="display:none;">
					<div class="receipt-mainR">							
						<div class="col-md-6" >
		  					<img width="100" height="100" src="<?php echo RUTA_URL.'/images/logo.jpg'?>">
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
						<div class="pull-right">
							<span class=" receipt-label">Cuenta de cobro: </span>
							<span class="text-consecutivo">N°. 9016</span>
							<table class="table table-bordered">
								<tr>
									<th >Fecha</th>
									<th >Fecha de vencimiento</th>											 
								</tr>
								<tr>
									<td><?php echo $datos['fecha']?></span></td>
									<td></td>
								</tr>
							</table>								
						</div>	  						
						<div class="col-md-6">
							<table class="table table-bordered">
								<tr>
									<th colspan="2">Nombre: <span class="text-largeR"><?php echo $datos['primerNombre'].' '.$datos['primerApellido'] ?></span>
									</th>												 
								</tr>
								<tr>
									<th colspan="2">CC:<span class="text-largeR "><?php echo $datos['documentoIdentidad']?></span></th>
								</tr>
								<tr>
									<th >Direccion:<span class="text-largeR"><?php echo $datos["direccion"] ?></span></th>
									<th>Ciudad: <span class="text-largeR" ><?php echo $datos["municipio"] ?></span> </th>
								</tr>
								<tr>
									<th >Teléfono: <span class="text-largeR"><?php echo $datos["numeroContacto"] ?></span></th>
									<th>e-mail:<span class="text-largeR"> <?php echo $datos["correo"] ?></span></th>
								</tr>
							</table>
						</div>																									
						<div class="row">								
							<div class="woocommerce">
								<div class="page_woo ">
									<table class="table table-bordered" >
										<thead>
											<tr>
											    <th style="font-size:10px;text-align: center" >Lote</th>		
												<th style="font-size:10px;text-align: center" colspan="2">Descripción</th>
												<th style="font-size:10px;text-align: center" >Cantidad</th>
												<th style="font-size:10px;text-align: center" >Vr Unitario</th>
												<th style="font-size:10px;text-align: center" >Valor</th>	
											</tr>							    		
										</thead>
										<?php foreach($datos['lotes']  as $cafe): ?>
										<tbody style="font-size:10px;" >							    	
											<tr><td WIDTH="5" HEIGHT="10" rowspan="9"><?php echo $cafe->codigoCafe?></td></tr>				<tr>
											    <td WIDTH="5" HEIGHT="10" rowspan="3">Molido</td>
											    <td WIDTH="5" HEIGHT="10">Lb</td>
											    <td WIDTH="5" HEIGHT="10"><?php echo $cafe->molidaLibra?></td>
											    <td WIDTH="5" HEIGHT="10"></td>
											    <td WIDTH="5" HEIGHT="10"></td>
											</tr>
											<tr>
											    <td>1/2 Lb</td>	
											    <td><?php echo $cafe->molidaMediaLibra?></td>
											    <td ></td>
											    <td></td>					               
											</tr>
											<tr>
											    <td>5 Lb</td>
											    <td><?php echo $cafe->molidaCincoLibras?></td>
											    <td></td>
											    <td></td>						                
											</tr>
											<tr>
											    <td rowspan="3">Libra</td>
											    <td>Lb</td>
											    <td><?php echo $cafe->granoLibra?></td>
											    <td></td>
											    <td></td>						                
											</tr>
											<tr>
											    <td>1/2 Lb</td>
											    <td><?php echo $cafe->granoMediaLibra?></td>
											    <td></td>
											    <td></td>
											</tr>
											<tr>
											    <td>5 Lb</td>
											    <td><?php echo $cafe->granoCincoLibras?></td>
											    <td></td>
											    <td></td>
											</tr>
											<tr>
											    <td colspan="2">Agranel</td>
											    <td><?php echo $cafe->agranel?></td>
											    <td></td>
											   	<td></td>						                
											</tr>
										<?php endforeach;?>
										</tbody>
									</table>
									<div class="cart-collaterals">
									    <div class="cart_totals">
									        <table class="shop_table shop_table_responsive">
									            <tbody>
									                <tr class="cart-subtotal">
									                    <th>Subtotal</th>
									                    <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>65</span>
									                    </td>
									                </tr>
									                <tr class="order-total">
									                    <th>Total</th>
									                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>65</span></strong> </td>
									                </tr>
									            </tbody>
									        </table>
									    </div>
									</div>
								</div>
							</div>																							
						</div>																		 
					</div>
				</div>
				<!-- FACTURA-->
				<!-- INFORME--> 				
				<div class="" id="mostrarInforme" style="display:none;">
					<div class="receipt-mainI">
						<div class="col-md-12">
							<div class="col-md-4">
	  							<img src="<?php echo RUTA_URL.'/images/logo.jpg'?>" 
	  							 width="100" height="100" >
	  						</div>
							<div class="col-md-4">
								<p class="receipt-title">Informe del proceso de Torrefacción</p>
							</div>
	  					</div><br>
	  					<div class="clearfix"></div>
	  					<div class="col-md-12" style="margin: 20px;">
		  					<div align="pull-right">
		  						<div class="receipt-section pull-left">
								    <span class="receipt-label text-large">	FECHA:</span>
								    <span class="text-large"><?php echo date("m/d/Y "); ?></span>
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
								
		  					</div>
	  					</div>
	  					 <div class="col-xs-12 text-page" style="margin: 20px;" >
							 	
							    <table class="table table-bordered">
							    	<thead>
							    		
							    		<tr >
								    		
								    		<th style="font-size:10px;text-align:">Lote</th>
								    		<th style="font-size:10px;text-align: center" >Peso pergamino</th>
								    		<th style="font-size:10px;text-align: center" >Mallas</th>
								    		<th style="font-size:10px;text-align: center" >Peso verde</th>
								    		<th style="font-size:10px;text-align: center" >Merma Trilla</th>
								    		<th style="font-size:10px;text-align: center" >Merma Tueste</th>
								    		<th style="font-size:10px;text-align: center" >Fecha Tueste</th>
								    		<th style="font-size:10px;text-align: center" >Fecha Trilla</th>
							    		</tr>
							    		
							    	</thead>
							    
							    		
							    	<tbody>
							    		<?php foreach($datos['lotes']  as $cafe): ?>
							    		<tr>					
							                
							                <td style="font-size:12px" scope="row"><?php echo $cafe->codigoCafe?></td>
							                <td style="font-size:12px"><?php echo $cafe->peso?></td>
							                <td style="font-size:12px"><?php echo $cafe->mallas?></td>
							                <td style="font-size:12px"><?php echo $cafe->pesoCafeVerde?></td>
							                <td style="font-size:12px"><?php echo $cafe->mermaTrilla?> %</td>
							                <td style="font-size:12px"><?php echo $cafe->mermaTueste?> % </td>
							                 <td style="font-size:12px"><?php echo $cafe->FechaTrilla?></td>
							                <td style="font-size:12px"><?php echo $cafe->FechaTueste?></td>
							            </tr>
			            				<?php endforeach;?>
							    		
							    	</tbody>
							    </table>
							    <div class="clearfix"></div>
							  <div class="col-md-12">
							  <div class="receipt-signature col-xs-4">
							    
							    <span class="receipt-label text-large">Firma Trilla</span>
							    <p class="receipt-line"></p>
							    <p>_________________</p>
							  </div>

							  <div class="receipt-signature col-xs-4">
							  	<span class="receipt-label text-large">Firma Tueste</span>
							    <p class="receipt-line"></p>
							    <p>_________________</p>
							  </div>
							  <div class="receipt-signature col-xs-4">
							  	<span class="receipt-label text-large">Firma Cliente</span>
							    <p class="receipt-line"></p>
							   <p>_________________</p>
							  </div>
							  </div>
						</div>	 																																		 
					</div>
				</div>
				<!-- INFORME--> 				
			</div>				
		</div>
	</section>
<!-- PRODUCT END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>