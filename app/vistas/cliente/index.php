<?php require RUTA_APP . '/vistas/inc/header.php' ?> 

<!-- CART -->
<div class="col-md-12">
	<h2>Lista de  Clientes</h2>
</div>
<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
<span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
<div class="col-md-12">
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
											<th class="product-remove">Nombre</th>
											<th class="product-remove">Apellidos</th>
											<th class="product-remove">Correo</th>
											<th class="product-remove">Contácto</th>
											<th class="product-remove">Dirección</th>
											<th class="product-remove">Estado</th>
											<th class="product-remove">Acciones</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
									<?php foreach($datos['personas']  as $usuario): ?>
										<tr class="cart_item">
											<td class="product-remove">					
												<?php echo $usuario->documentoIdentidad;?>								
											</td>
										
											<td class="product-remove">
												<a href="<?php echo RUTA_URL;?>/Cliente/detalle/<?php echo $usuario->idPersona;?>">
													<?php echo $usuario->primerNombre;?>
													<?php echo $usuario->segundoNombre;?>
												</a>
											</td>
										
											<td class="product-remove">
												<?php echo $usuario->primerApellido;?>
												<?php echo $usuario->segundoApellido;?>
											</td>
											<td class="product-remove">
												<?php echo $usuario->correo;?>				
											</td>
											<td class="product-remove">
												<?php echo $usuario->numeroContacto;?>				
											</td>
											<td class="product-remove">
												<?php echo $usuario->direccion;?>				
											</td>
											<td class="product-remove">
												<?php echo $usuario->estado;?>				
											</td class="product-remove">
											<td class="product-remove">
												<a href="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $usuario->idPersona;?>" class="btn btn-sm btn-default" >
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
                  <a href="#" class="prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i> Prev</a>
                  <a href="#" class="page-numbers current">1</a>
                  <a href="#" class="page-numbers">2</a>
                  <a href="#" class="page-numbers">3</a>
                  <a href="#" class="page-numbers">4</a>
                  <a href="#" class="next">Siguiente<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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