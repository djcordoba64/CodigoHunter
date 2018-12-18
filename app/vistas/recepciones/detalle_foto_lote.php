<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- WHERE TO BUY -->
<section class="where-buy alt">
	<div class="container">
		<div class="row">
			<a href="<?php echo RUTA_URL;?>/Recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Volver</a>
			<div class="col-md-12"><h2>Recepción</h2></div>
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
					                            		<span class="woocommerce-Price-currencySymbol"> # </span><?php echo $datos['numeroRecibo'] ?></span>
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
			<div class="col-md-8">
				<h4>Lotes de café</h4>
					<div class="tab-content">
						<div >
							<div  class="row">
								<table class="shop_table shop_table_responsive cart"  >
									<thead>
										<tr>
									        <!--<th class="product-remove">Codigo</th>-->
									        <th style="font-size:18px" class="product-remove">Lote</th>
									        <th style="font-size:18px" class="product-remove">Foto</th>
									        <th style="font-size:18px" class="product-remove">Acciones</th>
											
									    </tr>
									</thead>
									<tbody class="cart_item">
										<?php if (isset($datos['lotes'])) { foreach($datos['lotes'] as $cafe):?>


										<tr class="">
											<td class="product-remove"><?php echo $cafe->codigoCafe;?></td>
											<td class="product-remove"><img src="<?php echo RUTA_URL.'/images/cafes/lote'.$cafe->idcafe.'.jpg'?>" alt="" width="70px"></td>
											<td class="product-remove"><a  href="<?php echo RUTA_URL;?>/Cafes/cambiar_subir_foto/<?php echo $cafe->idcafe;?>" class="btn btn-sm btn-default" target="_blank" data-toggle="tooltip" title="Ver información detallada del lote y cambiar foto" >
	                       					<span class="glyphicon glyphicon-picture"></span> Cambiar foto
	                      					</a></td>
											
										</tr>
									<?php endforeach; }?>
									</tbody>
								</table>
							</div>
							
						</div>
									
					</div>
				
			</div>
	
		</div>
	</div>
</section>
<!-- WHERE TO BUY END -->



<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 