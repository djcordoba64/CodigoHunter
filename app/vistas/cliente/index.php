<?php require RUTA_APP . '/vistas/inc/header.php' ?> 

<!-- CART -->
<div class="col-md-12">
	<h2>Lista de  Clientes</h2>
</div>
	<section class="cart-wrap">

		<div class="container">
			
			<div class="row">				
					<div class="woocommerce">
					    <div class="page_woo woo_cart">
					        <form method="post">


        <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
        <span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
        
					            <table class="shop_table shop_table_responsive cart">
					                <thead>
					                    <tr>
					                        
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
												<a href="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $usuario->idPersona;?>">Editar</a>				
											</td>

										</tr>
									<?php endforeach;?>
					                </tbody>
					            </table>
					        </form>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 