<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CLIENTES_FINCAS- -->
	<section class="product-single">
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="woocommerce">
						<a href="<?php echo RUTA_URL;?>/Clientes/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
						<!--FORMULARIO FINCA-->
						<form action="<?php echo RUTA_URL;?>/Fincas/agregar" method="POST">
								<div class="woocommerce-tabs wc-tabs-wrapper">
									<h2>Datos de la finca</h2>		
								</div >
								<div id="customer_details">
									<div class="woocommerce-billing-fields">						        
										<div class="woocommerce-billing-fields__field-wrapper">										<div class="cold-md-12"></div>					
												<div class="col-md-6">
													<!--en el input hidden tare el id del cliente-->
												    <input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >
													<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
													<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >

													<p class="form-row form-row-wide" id="billing_company_field" data-priority="10">
														<label for="billing_first_name" class="">Nombre: <abbr class="required" title="required">*</abbr></label>
														<input type="text" class="input-text" name="nombreFinca" autofocus="autofocus" required value="<?php echo isset($datos['nombreFinca'])? $datos['nombreFinca'] : '';?>">
													</p>
													<!--Departamento--> 										       
													<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
														<label for="billing_country" class="">Departamento:</label>
														<select name="departamento" id="departamento" style="width:100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
														    <option value="0">SELECCIONE...</option>
														</select>        
													</p>	                
													<!--Municipio-->
													<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
														<label for="billing_country" class="">Municipio:</label>
															               
														<select name="municipio" id="municipio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
														</select>
													</p>
													<!--Vereda-->
													<p class="form-row form-row-wide" id="billing_company_field" data-priority="10">
														<label for="billing_first_name" class="">Vereda:</label>
													     <input type="text" class="input-text" name="vereda" autofocus="autofocus" value="<?php echo isset($datos['vereda'])? $datos['vereda'] : '';?>">
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
														<div class="col-md-7"">													 
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
													    		
												</div>
																				         									    	              	
										</div>

									 </div>	
									 <!--Dependiendo de si esta editando o no muestro el boton guardar o agregar para que el usuario sepa si esta editando o agregando uno nuevo-->
									    <input align="center" class="btn btn-lg btn-brown" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>">
									    
								</div>			
						</form>
					</div>	
				</div>		      			      			
				<div class="container">	
				<!--LISTA DE LA FINCAS-->			
				<div class="">
					<h2>Fincas agregadas</h2>
								<table class="shop_table shop_table_responsive cart">
						                <thead>
						                    <tr>
						                        
						                    	<th class="product-remove">Nombre</th>
												<th class="product-remove">Temperatura</th>
												<th class="product-remove">Departamento</th>
												<th class="product-remove">Municipio</th>
												<th class="product-remove">Vereda</th>
												<th class="product-remove">Estado</th>
												<th class="product-remove">Acciones</th>
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
													<?php echo $finca->departamento;?>				
												</td>
												<td class="product-remove">
													<?php echo $finca->municipio;?>				
												</td>
												<td class="product-remove">
													<?php echo $finca->vereda;?>				
												</td>
												<td class="product-remove">
													<?php echo $finca->Estado;?>				
												</td class="product-remove">
												<td class="product-remove">
													<!--esto me esta redireccionando al metodo fincas/agregar y le pasa el id de la finca (parametro $idFinca del metodo)-->
													<a href="<?php echo RUTA_URL;?>/Fincas/agregar/<?php echo $finca->idDetalleFinca;?>">
														Editar
													</a>		
												</td>
											</tr>
										<?php endforeach; }?>
						                </tbody>
					            </table>						
				</div>
			</div>
		</div>
	</section>							      														      																							
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 