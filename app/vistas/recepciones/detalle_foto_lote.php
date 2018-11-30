<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- WHERE TO BUY -->
<section class="where-buy alt">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2>Recepción</h2></div>
			<div class="col-md-4">					
				<h6>Descripción de la recepción.</h6>
				<div class="product-info">
					<div class="item">Fecha: <label style="color: #b89d64;font-size:20px"><span><?php echo $datos['fecha']?></span></label></a></div>
					<div class="item">Número de recibo: <strong style="color: #b89d64;font-size:20px"><?php echo $datos['numeroRecibo']?></strong></div>
				</div>
			</div>
			<br>
			<div class="col-md-8">
				<h6>Lotes de café</h6>
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
											<td class="product-remove"><a  href="<?php echo RUTA_URL;?>/Cafes/cambiar_subir_foto/<?php echo $cafe->idcafe;?>" class="btn btn-sm btn-default" target="_blank">
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