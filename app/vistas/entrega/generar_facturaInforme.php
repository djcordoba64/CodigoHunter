<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<?php var_dump($datos) ?>

<!-- PRODUCT --> 
	<section class="product-single">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo RUTA_URL;?>/recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
					<h2 class="related-title">Facturación</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="product-item">
								<div class="img-wrap"><a href="#"><img src="images/prod-img.jpg" alt=""></a></div>
								<div class="name" >Para generar la factura de entrega o el informe del proceso de torrefacción.</div>
								<div class="text">Has clic en una de las  seguientes opciones.</div><br>
								<button class="btn btn-default" id="generarRecibo" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Generar factura</button>
								<button class="btn btn-default" id="generarRecibo" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Generar informe</button>
								
							</div>

						</div>						
					</div>
				</div>
				<!-- facrura --> 
				<div class="col-md-12" >
					<div class="cart-wrap" id="mostrarRecibo" style="display:none;">
						<div class="receipt-mainR">
							<div class="col-md-12" >
								<div>								
									<div class="col-md-6" >
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
											<th >Direccion:<span class="text-largeR"><?php echo $datos["direccion"] ?></span> </th>
											<th>Ciudad: <span class="text-largeR" ><?php echo $datos["municipio"] ?></span> </th>
										</tr>
										<tr>
											<th >Teléfono: <span class="text-largeR"><?php echo $datos["numeroContacto"] ?></span></th>
											<th>e-mail:<span class="text-largeR"> <?php echo $datos["correo"] ?></span></th>
										</tr>
									</table>
								</div>																

								
									
			<div class="row">
				<div class="col-md-12">
					<div class="woocommerce">
					    <div class="page_woo woo_cart">
					      			<table class="table table-bordered">
							    	<thead>
							    		<tr >
							    			<th style="font-size:10px;text-align: center" >Lote</th>		
								    		<th style="font-size:10px;text-align: center" colspan="2">Descripción</th>
								    		<th style="font-size:10px;text-align: center" >Cantidad</th>
								    		<th style="font-size:10px;text-align: center" >Vr Unitario</th>
								    		<th style="font-size:10px;text-align: center" >Valor</th>	
								    			    		
											
							    		</tr>							    		
							    	</thead>
							    	<tr>
						                <td rowspan="9">Lote</td>					               
						            </tr>
							    	<tr>
						                <td rowspan="3">Molido</td>
						                <td>Lb</td>
						                
						            </tr>
						            <tr>
						                <td>1/2 Lb</td>						               
						            </tr>
						            <tr>
						                <td>5 Lb</td>
						                
						            </tr>
						            <tr>
						                <td rowspan="3">Libra</td>
						                <td>Lb</td>
						                
						            </tr>
						            <tr>
						                <td>1/2 Lb</td>
						               
						            </tr>
						            <tr>
						                <td>5 Lb</td>
						                
						            </tr>
						             <tr>
						                <td colspan="2">Agranel</td>
						                
						                
						            </tr>
						           
							    		
							    	<tbody>

							    		
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
														 
						</div>
					</div>
				</div >
				<!-- factura--> 
			</div>
		</div>
	</section>
	<!-- PRODUCT END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>