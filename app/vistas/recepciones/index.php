<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="col-md-12">
	<h2>Recepción</h2>
</div>

<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
<span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
	<section class="cart-wrap">
		<div class="container">			
			<div class="row">				
					<div class="woocommerce">
					    <div class="page_woo woo_cart">
					    	<a href="<?php echo RUTA_URL;?>/paginas/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
					    	<div class="col-md-12">
								<div class="col-sm-7">
									<div class="footer-social">
										<div class="title"></div>
											<ul class="social">
												<li><a href="<?php echo RUTA_URL;?>/Recepciones/registrar_nueva" data-toggle="tooltip" title="Nueva recepcion" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a></li>
											</ul>	
									</div>
								</div>
								<div class="col-sm-5" >
								          <div class="widget-area" role="complementary" style="margin: 20px;" >
								            <aside class="widget">
								              <h4>Buscar</h4>
								              <div class="content">
								                <div class="form wp-searchform" method="get">
								                  <input  type="text" name="search"  id="buscar" onkeyup="buscarRecepcion()" placeholder="Número de recibo">
								                  <button type="submit" class="fa fa-search"></button>
								                </div>
								              </div>
								            </aside>
								        </div>	      
								</div>
							</div>
					        <form method="post">        
					            <table class="shop_table shop_table_responsive cart" id="tbl_Recepcion" >
					                <thead>
					                    <tr class="header">
					                    	<th class="product-remove">Recibo</th>	
					                    	<th class="product-remove">Fecha</th>                    		
					                    	<th class="product-remove">Cliente</th>
											<th class="product-remove">Documento</th>							
											<th class="product-remove">Estado</th>
											<th class="product-remove">Acciones</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
									<?php foreach($datos['recepciones']  as $recepcion): ?>
										<tr class="cart_item">
											<td class="product-remove">
												<a data-toggle="tooltip" title="Ver detalle de la recepción" href="<?php echo RUTA_URL;?>/Recepciones/detalle/<?php echo $recepcion->numeroRecibo;?>">
													<?php echo $recepcion->numeroRecibo;?>					
												</a>
											</td>
											<td class="product-remove">					
												<?php echo $recepcion->fecha;?>								
											</td>
										
											
										
											<td class="product-remove">
												<?php echo $recepcion->Cliente;?>				
											</td>
											<td class="product-remove">
												<?php echo $recepcion->documento;?>				
											</td>
											<td class="product-remove">
												<?php echo $recepcion->estado;?>				
											</td class="product-remove">
											<td class="product-remove">
												<a data-toggle="tooltip" title="Ver los lotes agregados a la recepcion" href="<?php echo RUTA_URL;?>/Recepciones/mostrar_opcion_foto/<?php echo $recepcion->numeroRecibo;?>" class="btn btn-sm btn-default" >
												 <span class=""></span> Lotes
												 </a>
												<a data-toggle="tooltip" title="Anular la recepción" href="<?php echo RUTA_URL;?>/Recepciones/CambiarEstado/<?php echo $recepcion->NumeroRecibo;?>" class="btn btn-sm btn-bordered" >
												 <span class="glyphicon glyphicon-remove"></span> Anular
												 </a>
												 				
											</td class="product-remove">

										</tr>
									<?php endforeach;?>
					                </tbody>
					            </table>
					        </form>
					        	<div class="col-md-12">
						             <div class="paging-navigation">
						              <hr>
						              <div class="pagination">


						                  <a class="prev <?php  echo $datos['pagina']<= 1? 'disabled' :'' ?>  " href="<?php echo RUTA_URL;?>/Recepciones/index/<?php echo ($datos['pagina']-1)?>" >
						                    <i class="fa fa-chevron-left" aria-hidden="true"></i>Anterior
						                  </a>

						                  <?php for ($i=0; $i<$datos['numeroPaginas'] ; $i++): ?>

						                    <a href="<?php echo RUTA_URL;?>/Recepciones/index/<?php echo $i+1 ?> " class="page-numbers current <?php echo $datos['pagina']==$i+1 ? 'active':''?> "><?php echo $i+1 ?></a>
						                  
						                  <?php endfor?>
						                
						                  <a  class="next <?php  echo $datos['pagina']>= $datos['numeroPaginas'] ? 'disabled' :'' ?>"  href="<?php echo RUTA_URL;?>/Recepciones/index/<?php echo $datos['pagina']+1 ?>">Siguiente
						                  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>

						                  
						              </div>
						          </div>
        						</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>



<?php require RUTA_APP . '/vistas/inc/footer.php' ?>