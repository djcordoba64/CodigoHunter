<?php require RUTA_APP . '/vistas/inc/header.php' ?> 

<!-- CART -->
<div class="col-md-12">
	<h2>Lista de  Clientes</h2>
</div>

<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
<span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
<div class="col-md-12" >
      <div  class="col-md-4">
          <div class="widget-area" role="complementary">
            <aside class="widget">
              <h4>Buscar</h4>
              <div class="content">
                <div class="form wp-searchform" method="get">
                  <input  type="text" name="search"  id="buscar" onkeyup="buscarCliente()" placeholder="Documento">
                  <button type="submit" class="fa fa-search"></button>
                </div>
              </div>
            </aside>
        </div>
      </div>
    </div>
	<section class="cart-wrap">
		<div class="container">			
			<div class="row">				
					<div class="woocommerce">
					    <div class="page_woo woo_cart">
					        <form method="post">        
					            <table class="shop_table shop_table_responsive cart" id="tbl_Cliente" >
					                <thead>
					                    <tr class="header">									                        
					                    	<th class="product-remove">Documento</th>
											<th class="product-remove">Nombre Completo</th>											
											<th class="product-remove">Correo</th>
											<th class="product-remove">Contácto</th>
											<th class="product-remove">Dirección</th>
											<th class="product-remove">Estado</th>
											<th class="product-remove">Acciones</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
									<?php foreach($datos['personas']  as $cliente): ?>
										<tr class="cart_item">
											<td class="product-remove">					
												<?php echo $cliente->documentoIdentidad;?>								
											</td>
										
											<td class="product-remove">
												<a href="<?php echo RUTA_URL;?>/Cliente/detalle/<?php echo $cliente->idPersona;?>">
													<?php echo $cliente->primerNombre;?>
													<?php echo $cliente->segundoNombre;?>
													<?php echo $cliente->primerApellido?>
													<?php echo $cliente->segundoApellido ?>
													
												</a>
											</td>
										
											<td class="product-remove">
												<?php echo $cliente->correo;?>				
											</td>
											<td class="product-remove">
												<?php echo $cliente->numeroContacto;?>				
											</td>
											<td class="product-remove">
												<?php echo $cliente->direccion;?>				
											</td>
											<td class="product-remove">
												<?php echo $cliente->estado;?>				
											</td class="product-remove">
											<td class="product-remove">
												<a href="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $cliente->idPersona;?>" class="btn btn-sm btn-default" >
												 <span class="glyphicon glyphicon-edit"></span> Editar
												 </a>				
											</td>

										</tr>
									<?php endforeach;?>
					                </tbody>
					            </table>
					        </form>
					        	<div class="col-md-12">
						             <div class="paging-navigation">
						              <hr>
						              <div class="pagination">


						                  <a class="prev <?php  echo $datos['pagina']<= 1? 'disabled' :'' ?>  " href="<?php echo RUTA_URL;?>/Cliente/index/<?php echo ($datos['pagina'])?>" >
						                    <i class="fa fa-chevron-left" aria-hidden="true"></i>Anterior
						                  </a>

						                  <?php for ($i=0; $i<$datos['numeroPaginas'] ; $i++): ?>

						                    <a href="<?php echo RUTA_URL;?>/Cliente/index/<?php echo $i+1 ?> " class="page-numbers current <?php echo $datos['pagina']==$i+1 ? 'active':''?> "><?php echo $i+1 ?></a>
						                  
						                  <?php endfor?>
						                
						                  <a class="next <?php  echo $datos['pagina']>= $datos['numeroPaginas'] ? 'disabled' :'' ?>"  href="<?php echo RUTA_URL;?>/Cliente/index/<?php echo $datos['pagina']+1 ?>">Siguiente
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