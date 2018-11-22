<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CLIENTES_FINCAS- -->
<a href="<?php echo RUTA_URL;?>/Clientes/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
<div class="col-md-12">
	<h2>Información de la finca</h2>
</div>
<section class="cart-wrap">	
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" id="form1" method="POST">
				<!--hiddens para guardar temporalmente datos del cliente-->
					<input type="hidden" name="primerNombre" value="<?php echo isset($datos['primerNombre'])? $datos['primerNombre'] : '';?>">
					<input type="hidden" name="segundoNombre" value="<?php echo isset($datos['segundoNombre'])? $datos['segundoNombre'] : '';?>">
					<input type="hidden" name="primerApellido" value="<?php echo isset($datos['primerApellido'])? $datos['primerApellido'] : '';?>">
					<input type="hidden" name="segundoApellido" value="<?php echo isset($datos['segundoApellido'])? $datos['segundoApellido'] : '';?>">
					<input type="hidden" name="documentoIdentidad" value="<?php echo isset($datos['documentoIdentidad'])? $datos['documentoIdentidad'] : '';?>">
					<input type="hidden" name="fechaNacimiento" value="<?php echo isset($datos['fechaNacimiento'])? $datos['fechaNacimiento'] : '';?>">
					<input type="hidden" name="sexo" value="<?php echo isset($datos['sexo'])? $datos['sexo'] : '';?>">
					<input type="hidden" name="correo" value="<?php echo isset($datos['correo'])? $datos['correo'] : '';?>">
					<input type="hidden" name="numeroContacto" value="<?php echo isset($datos['numeroContacto'])? $datos['numeroContacto'] : '';?>">
					<input type="hidden" name="direccion" value="<?php echo isset($datos['direccion'])? $datos['direccion'] : '';?>">
					<input type="hidden" name="estado" value="<?php echo isset($datos['estado'])? $datos['estado'] : '';?>">
				<!--hiddens para guardar temporalmente datos del cliente-->

				<!--hiddens para guardar temporalmente las fincas que se van creando y poder guardarlas todas al final junto con el cliente-->	
				<input type="hidden" name="fincasJson" value='<?php echo isset($datos['fincasJson'])? $datos['fincasJson'] : '';?>'>
				<!--array de fincas en una cadena de json-->
				<div class="row">
					<div id="customer_details">
						<div class="woocommerce-billing-fields">
							<div class="col-md-5" >
								<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
								<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >
								<!--Nombre de la finca--> 
								<p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
								<label for="billing_first_name" class="">Nombre de la finca: <abbr class="required" title="required">*</abbr></label>
								<input type="text" class="input-text" name="nombreFinca" autofocus="autofocus" required value="<?php echo isset($datos['nombreFinca'])? $datos['nombreFinca'] : '';?>" onkeypress="return soloLetras(event);" id="nombreFinca" >
								</p>
								<!--Departamento--> 										       
								<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
									<label for="billing_country" class="">Departamento:</label>
									<select required  name="departamento" id="departamento" style="width:100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
									<option value="0">SELECCIONE...</option>
									</select>        
								</p>	                
								<!--Municipio-->
								<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
									<label for="billing_country" class="">Municipio:</label>
									<select required name="municipio"  id="municipio" style="width:100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
									</select>
								</p>
								<!--Vereda-->
								<p class="form-row form-row-wide" id="billing_company_field" data-priority="10">
									<label for="billing_first_name" class="">Vereda:</label>
								<input type="text" class="input-text" name="vereda" autofocus="autofocus" value="<?php echo isset($datos['vereda'])? $datos['vereda'] : '';?>" onkeypress="return soloLetras(event);" id="vereda">
								</p>
								<!--Coordenadas Google-->  										       
								<p class="form-row form-row-wide" validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
									<label for="billing_company" class="">Coordenadas Google:</label>
									<input type="text" class="input-text"  name="coordenadasGoogle" autofocus="autofocus" value='<?php echo isset($datos['coordenadasGoogle'])? $datos['coordenadasGoogle'] : '';?>'>	
								</p>
								<div class="cold-md-12">
									<div class="col-md-4">
										<!--Temperatura-->
										<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
										<label for="billing_first_name">Temperatura<abbr class="required" title="required">			
											<div class="quantity">
												<input type="number"  min="10"  name="Temperatura" value="<?php echo isset($datos['Temperatura'])? $datos['Temperatura'] : '';?>"">
				                            	<div class="quantity-nav">
					                            	<div class="quantity-button quantity-up">
					                            		<i class="fa fa-chevron-up" aria-hidden="true"></i>
					                            	</div>
					                            	<div class="quantity-button quantity-down">
					                            		<i class="fa fa-chevron-down" aria-hidden="true"></i>
					                            	</div>
				                            	</div>
				                       		</div>						
										</p>
									</div>
									<div class="col-md-8">													 
										<!--Estado-->
										<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
											<label for="billing_first_name" class="">Estado:</label>
												<select name="Estado" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
													<option value="Habilitado" <?php (isset($datos['Estado']) && $datos['Estado'] =='Habilitado')? print "selected='selected'" : print "";?>>Habilitado</
													</option>
													<option value="Inhabilitado" <?php (isset($datos['Estado']) && $datos['Estado'] =='Inhabilitado')? print "selected='selected'" : print "";?>>Desabilitado</option>
												</select>
										</p>
									</div>
								</div>
								<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
								<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Fincas/agregar_guardar_temporalmente',true)" class="btn btn-default" type="button" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>">
							</div>
							<div class="col-md-7" >
								<div class="col-md-12" align="center">
									<h4>Fincas Agregadas</h4>
								</div>
								<div class="">
									<table class="shop_table shop_table_responsive cart" width="700">
										<thead>
						                    <tr>
						                        
						                    	<th class="">Nombre</th>
												<th class="">Dpto</th>
												<th class="">Municipio</th>
												<th class="">Vereda</th>
												<th class="">Temperatura</th>
												<th class="">Acciones</th>
						                    </tr>
					                	</thead>
					                	<tbody  class="cart_item">
											<?php if (isset($datos['fincasArr'])) { foreach($datos['fincasArr'] as $finca): ?>
											<tr class="cart_item">
												<td class="product-remove">					
													<?php echo $finca["nombreFinca"];?>								
												</td>
												<td class="product-remove">					
													<?php echo $finca["nombreDepartamento"];?>								
												</td>
												<td class="product-remove">
													<?php echo $finca["nombreMunicipio"];?>				
												</td>
												<td class="product-remove">
													<?php echo $finca["vereda"];?>				
												</td>
												<td class="product-remove">
														<?php echo $finca["Temperatura"];?>
												</td class="cart_item">
												
												<td class="product-remove">
												<!--boton de editar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
												<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Fincas/agregar_editar_temporal/<?php echo $finca["idDetalleFinca"];?>')" class="btn btn-sm btn-default" type="button" value="Editar">	
												</td>
											</tr>
											<?php endforeach; }?>
					                	</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<hr>					
					
				</div>
				<div class="col-md-12" align="center">
				<?php if (isset($datos['fincasArr']) and count($datos['fincasArr'])>0) { ?>
				<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cliente/crear_guardar')" class="btn btn-lg btn-brown" type="button" value="finalizar">
				<?php }     ?>
				</div>
			</form>
		</div>
	</div>
</section>   

<!-- CLIENTES_FINCAS- -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 