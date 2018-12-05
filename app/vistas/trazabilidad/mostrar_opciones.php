<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<?php var_dump($datos) ?>
<!-- SHOP -->
	<div class="shop-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
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
				<div class="col-md-9">
					<div class="product-list">
						<div class="row">
							<div class="col-md-12">
								<div class="woocommerce-toolbar">
									<div class="row">		
										<div class="col-md-8 col-sm-6" align="center">
											<strong>Selecciones un lote de café para visualizar la trazavilidad. <i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i></strong>
										</div>
										<div class="col-md-4 col-sm-6">
											<select style="width: 100%" class="woo-sort select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							                    <option value="">Sort by newness</option>
							                    <option value="">Sort by score</option>
							                </select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img.jpg" alt=""></a></div>
									<a href="product.html" class="name">100%  Arabica</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$19</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img1.jpg" alt=""></a></div>
									<a href="product.html" class="name">Espresso Premium</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$46</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- SHOP END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 