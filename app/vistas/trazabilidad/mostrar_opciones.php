<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<!-- SHOP -->
	<div class="shop-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="testimonials">		
						<div class="col-md-3 testimonials-list">
							<div class="review-item">
								<div class="quote">
									<p>Bienvenid@!</p>			
									<i class="fa fa-user"></i>
									<div class="name"><?php echo $datos['primerNombre'].' '.$datos['segundoNombre'].' '.$datos['primerApellido'].' '.$datos['segundoApellido']?></div>
					    		<div class="date"><?php echo $datos['correo'] ?></div>
								</div>
					    		
				    		</div>
				    	</div>
				    </div>
			    </div>
				<div class="col-md-2">
					<aside class="shop-sidebar">
					    <div class="widget-area">
					        <ul>
					            <li class="widget-container woocommerce widget_shopping_cart">
					                <h3 class="widget-title">Recibo</h3>
					                <div class="widget_shopping_cart_content">
					                    <ul class="cart_list product_list_widget ">
					                        <li class="mini_cart_item">
					                        	<div class="name"><strong>Numero</strong><br>
					                            <span class="quantity">
					                            	<span class="woocommerce-Price-amount amount">
					                            		<span class="woocommerce-Price-currencySymbol"> # </span><?php echo $datos['idRecepcion'] ?></span>
					                            </span>
					                        </li>
					                        <li class="mini_cart_item">
					                           <div class="name"><strong>Fecha</strong><br>
					                           
					                            <span class="quantity">
					                            	<span class="woocommerce-Price-amount amount">
					                            		<span class="woocommerce-Price-currencySymbol"> <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> </span> <?php echo $datos['fecha'] ?></span>
					                            </span>
					                        </li>
					                    </ul>
					                    
					                </div>
					                <div class="clearfix"></div>
					            </li>
					        </ul>
					    </div>
					</aside>
				</div>
				<div class="col-md-10">
					<div class="product-list">
						<div class="row">
							<div class="col-md-12">
								<div class="woocommerce-toolbar">
									<div class="row">		
										<div class="col-md-8 col-sm-6" align="center">
											<strong>Selecciones un lote de café para visualizar la trazavilidad. <i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i></strong>
										</div>
										<div class="col-md-4 col-sm-6">
											<select style="width: 100%" class="woo-sort select2-hidden-accessible"  name="codigoLote" id="codigoLote" aria-hidden="true">
							                    <option value="">Seleccione..</option>
							                </select>
							                  
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12" id="idcafe">
								<div class="content-VisualTra">
									   <h1>Trazabilidad</h1>		 									   		
									   <img class="img-trazabilidad" src="<?php echo RUTA_URL;?>/images/favicon.png">
									   <label>En procesamineto</label>
										
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- SHOP END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 