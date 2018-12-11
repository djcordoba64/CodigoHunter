<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- WHERE TO BUY -->
	<section class="where-buy alt">
		<div class="container">
			<div class="row">
				<a href="<?php echo RUTA_URL;?>/recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
				<div class="col-md-12"><h2>Recepción</h2></div>
				<p>Aquí se muestra de forma detallada la información de la recepción.</p>
				<div class="col-md-12">
					<div class="tab-content">
						<div >
							<div class="row" >
								<div class="col-md-3 col-sm-3" >
									<div class="buy-item" >
										<div class="info">
											<address style="font-size:20px">Recibo</address>
											<div class="phone"><label >Numero:</label><span style="color: #b89d64;font-size:18px"><?php echo $datos['numeroRecibo'] ?></span></div>
											<div class="phone"><label >Fecha:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['fecha'] ?></span></div>										
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="buy-item">
										
										<div class="info">
											<address style="font-size:17px">Datos del cliente</address>
											<div class="phone"><label >Nombre:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['primerNombre']."
											".$datos['primerApellido'] ?></span></div>

											<div class="phone"><label >Documento:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['documentoIdentidad'] ?></span></div>
											
											<div class="phone"><label >Contácto:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['numeroContacto'] ?></span></div>
											
											<div class="phone"><label >Correo:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['correo'] ?></span></div>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-sm-4">
									<div class="buy-item">
										<div class="info">
											<address style="font-size:17px">Datos de la finca</address>	
											<div class="phone"><label >Nombre:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['nombreFinca'] ?></span></div>
											<div class="phone"><label >Municipio:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['municipio'] ?></span></div>
											<div class="phone"><label >Vereda:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['Vereda'] ?></span></div>
												
											<div class="phone"><label >Temperatura promedio:</label><span style="color: #b89d64;font-size:18px"> <?php echo $datos['temperatura'] ?> ℃</span></div>
											
											
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="col-md-12"><h5>Lotes de café agragados a la recepción</h5></div>
							<div  class="row">
								<table class="shop_table shop_table_responsive cart"  >
									<thead>
										<tr>
									        <!--<th class="product-remove">Codigo</th>-->
									        <th style="font-size:18px" class="product-remove">Lote</th>
											<th style="font-size:18px" class="product-remove">Peso</th>
											<th style="font-size:18px" class="product-remove">Especie</th>
											<th style="font-size:18px" class="product-remove">Variedad</th>
											<th style="font-size:18px" class="product-remove">Humedad</th>
											<th style="font-size:18px" class="product-remove">Factor rendimiento</th>
											<th style="font-size:18px" class="product-remove">Tipo tueste</th>
											<th style="font-size:18px" class="product-remove">Cantidad</th>
											<th style="font-size:18px" class="product-remove">Valor</th>
											<th style="font-size:18px" class="product-remove">Estado</th>
											
									    </tr>
									</thead>
									<tbody class="cart_item">
										<?php if (isset($datos['lotes'])) { foreach($datos['lotes'] as $cafe):?>


										<tr class="">
											<td class="product-remove"><?php echo $cafe->codigoCafe;?></td>
											<td class="product-remove"><?php echo $cafe->peso;?></td>
											<td class="product-remove"><?php echo $cafe->especie;?></td>
										
											<td class="product-remove"><?php echo $cafe->variedad;?></td>
										
											<td class="product-remove"><?php echo $cafe->porcentajeHumedad;?></td>										
											<td class="product-remove"><?php echo $cafe->factorRendimiento;?></td>
																				
											<td class="product-remove"><?php echo $cafe->tipoTueste;?></td>
																				
											<td class="product-remove"><?php echo $cafe->cantidad;?></td>
										
											<td class="product-remove"><?php echo $cafe->valorUnitario;?></td>
											<td class="product-remove"><?php echo $cafe->estado;?></td>
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