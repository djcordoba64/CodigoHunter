<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- WHERE TO BUY -->
<section class="where-buy alt">
		<div class="container">
			<div class="row">
				<div class="col-md-12"><h2>Recepción</h2></div>
				<div class="description">Descripción de la recepción.</div><br>
				<div class="product-info">
						<div class="item">Fecha: <label style="color: #b89d64;font-size:20px"><span><?php echo $datos['fecha']?></span></label></a></div>
						<div class="item">Número de recibo: <strong>10</strong></div>
				</div>
				<br>
				<div class="description">Acontinuación se muestra una tabla con una lista de los lotes de cafés que se agregarón a la recepcón,en la columna acciones, en la opción "Foto" podrá cambiar o subir una imagen del respectivo lote seleccionado.</div>

				<div class="col-md-6">					
					<hr>
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
											<td class="product-remove"><?php echo $cafe->foto;?></td>
											<td class="product-remove"><a  href="<?php echo RUTA_URL;?>/Cafes/cambiar_subir_foto/<?php echo $cafe->idcafe;?>" class="btn btn-sm btn-default" target="_blank">
	                       					<span class="glyphicon glyphicon-picture"></span> Foto
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