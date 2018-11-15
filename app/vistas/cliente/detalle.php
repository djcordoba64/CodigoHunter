<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<section class="where-buy alt">
  	<div class="container">
  		<div class="row">
  			<a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Volver</a>
  			<div class="col-md-12"><h2>Información del cliente</h2></div> 			
				<div class="contact-left">
					<div class="col-md-3">
						<div class="item">
							<div class="title"><i class="fa fa-user" aria-hidden="true"></i> Documento</div>
							<p>*<?php echo $datos['documentoIdentidad']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="fa fa-user" aria-hidden="true"></i> Nombre completo</div>
							<p>*<?php echo $datos['primerNombre']." ". $datos['segundoNombre']." ". $datos['primerApellido']." ". $datos['segundoApellido']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> Fecha nacimiento</div>
							<p>*<?php echo $datos['fechaNacimiento']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Sexo</div>
							<p>*<?php echo $datos['sexo']?></p>
						</div>
																		
					</div>
					<div class="col-md-3">
						<div class="item">
							<div class="title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Correo</div>
							<p>*<?php echo $datos['correo']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="fa fa-phone" aria-hidden="true"></i> Número de contácto</div>
							<p>*<?php echo $datos['numeroContacto']?> </p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-home" aria-hidden="true"></i> Dirección</div>
							<p>*<?php echo $datos['direccion']?></p>
						</div>
						<div class="item">
							<div class="title"><i class="glyphicon glyphicon-retweet" aria-hidden="true"></i> Estado</div>
							<p>*<?php echo $datos['estado']?></p>
						</div>
					</div>
					<div class="col-md-6">
				<!--Lista de las fincas agregadas al cliente-->	
				<div class="col-md-12"><h3>Fincas</h3></div> 		
					<div class="">
						
									<table class="shop_table shop_table_responsive cart" width="600">
					                <thead>
					                    <tr>
					                        
					                    	<th class="product-remove">Nombre</th>
											<th class="product-remove">Temperatura</th>
											<th class="product-remove">Municipio</th>
											<th class="product-remove">Vereda</th>
											<th class="product-remove">Estado</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
					             
									<?php if (isset($datos['fincas'])) { foreach($datos['fincas'] as $finca): ?>
										<tr class="cart_item">
											<td class="product-remove">					
												<?php echo $finca->nombreFinca;?>								
											</td>
										
											<td class="product-remove">
													<?php echo $finca->Temperatura;?>
											</td class="cart_item">
											<td class="product-remove">
												<?php echo $finca->municipio;?>				
											</td>
											<td class="product-remove">
												<?php echo $finca->vereda;?>				
											</td>
											<td class="product-remove">
												<?php echo $finca->Estado;?>				
											</td>

										</tr>
									<?php endforeach; }?>
					                </tbody>
					            </table>
						
									
			</div>
					</div>
			</div>
  		</div>
  	</div>

  	
  </section>


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 

