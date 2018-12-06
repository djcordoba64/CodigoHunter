<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- SHOP -->
	<div class="shop-wrap">
		<div class="product-single">
			<div class="row">
				<div class="col-md-12"><h2>Recepción del café</h2></div>								
				<div class="col-md-12">
					<div class="product-list">
						<div class="row">
							<div class="cart-wrap">
								<div class="woocommerce">
									<form class="checkout woocommerce-checkout">
										<!--en el input hidden tare el id del cliente-->
										<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >
											<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
										<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >
										<!--en el input hidden tare el id del cliente-->
										<input type="hidden" name="correo" value="<?php echo $datos["correo"] ?>" >
										<!--en el input hidden tare el id del cliente-->
										<input type="hidden" name="direccion" value="<?php echo $datos["direccion"] ?>" >
										<!--en el input hidden tare el id del cliente-->
										<input type="hidden" name="Temperatura" value="<?php echo $datos["Temperatura"] ?>" >
										<!--hidden para guardar temporalmente los lotes de cafe que se van creando y poder guardarlas todas al final junto con el cliente y la finca-->	
										<input type="hidden" name="lotesJson" value='<?php echo isset($datos['lotesJson'])? $datos['lotesJson'] : '';?>'><!--array de lotes de cafe en una cadena de json-->
										<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
										<input type="hidden" name="idLoteCafe" value="<?php echo isset($datos['idLoteCafe'])? $datos['idLoteCafe'] : '-1';?>" >
										<div class="container">
											<div class="col-md-7">
												<div id="customer_details">
												  	<div class="woocommerce-billing-fields">
												        <div class="woocommerce-billing-fields__field-wrapper">
												        	<p class="form-row form-row-first validate-required " id="" data-priority="100">
												                <label for="variedad" class="">Variedad<abbr class="required" title="required">*</abbr>
												                </label>
												                <input class="input-text " type="text" name="variedad" id="variedad" onkeypress="return soloLetras(event);" id="variedad"  value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>" required>
												            </p>
												            <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
												                <label for="TipoTueste" class="">Tipo de Tueste<abbr class="required" title="required">*</abbr>
												                </label>
												                <input class="input-text " name="tipoTueste" nkeypress="return soloLetras(event);" id="tipoTueste"   type="text" value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>"required>
												            </p>												            
												            <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
												                <label for="materia">Materia Prima<abbr class="required" title="required">*</abbr>
												                </label>
												                <select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
												                    <option value="">Seleccione...</option>												                   
												                </select>
												            </p>
												            <p class="form-row form-row-last validate-required woocommerce-validated"  data-priority="20">
												                <label for="">Tipo de beneficio<abbr class="required" title="required">*</abbr>
												                </label>
												                <select name="billing_country" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
												                    <option value="">Seleccione...</option>
												                </select>
												            </p><br>												            
												            
												           
												        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">	
												            	<label for="billing_first_name" class="">Especie:</abbr></label>
																<ul>
															        <li>									        
																	    <input type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required>Robusta
																	    <input type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?>>Arábiga
																    </li>
															    </ul>
															</div>
														</div>
													</div>
													<hr>
													<div>
														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												            	<label for="factorRendimiento" class="">Factor rendimiento<abbr class="required" title="required">*</abbr></label>											            	
												            	<div class="quantity">									
							                           			 	<input type="number" name="factorRendimiento"  min="1"  step="1" value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>">
																</div>
												        	</div>
														 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
												            	<label for="PorcentajeHumedad" class="">% Humedad<abbr class="required" title="required">*</abbr></label>
												            	<div class="quantity">									
							                           			 	<input type="number" name="PorcentajeHumedad"  min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																</div>
												        	</div>
												        	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">							    	<div class="quantity">									
							                           			 	<label for="peso" class="">Peso<abbr class="required" title="required">*</abbr></label><input type="number" name="Temperatura"  min="1"  step="1" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>">
																</div>
												        	</div><br>
														 															
													</div>
													<hr>
													<div style="margin: 40px;">														
												        <label for="PorcentajeHumedad" class="">Cantidad<abbr class="required" title="required">*</abbr></label>
												         <div class="quantity">									
							                           		<input type="number" name="PorcentajeHumedad"  min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
														</div>
														<input class="input-text " name="tipoTueste" nkeypress="return soloLetras(event);" id="tipoTueste"   type="text" value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>"required>
												        <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
												             <label for="TipoTueste" class="">Valor<abbr class="required" title="required">*</abbr></label>
												             
												        </p>														
													</div>												
												</div>
											</div>
											<div class="col-md-5">
												<aside class="shop-sidebar">
													<div class="widget-area">												    	
												    	<div  class="widget-container woocommerce widget_shopping_cart">
												    		<div class="art_list product_list_widget ">
												    			<h3 class="widget-title">Forma de entrega</h3><hr>
												    			<!--Molida-->
												    			<label style="color: #b89d64;font-size:20px"><span>Molida</span></label>
													    		<div class="mini_cart_item ">											
													                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">1/2 Lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        		<!---->
													                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">5 lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>													                   
													            </div>
													            <!--Grano-->
													             <label style="color: #b89d64;font-size:20px"><span>Grano</span></label>
													            <div class="mini_cart_item ">
													                
													                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        		<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">1/2 Lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        		<!---->
													                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">5 lb</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        	</div>
													        	<!--Agranel-->
													        	<label style="color: #b89d64;font-size:20px"><span>Agranel</span></label>
													        	<div class="mini_cart_item ">													<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														            	<label for="PorcentajeHumedad" class="">Agranel</label>
															           	<div class="quantity">									
										                           			<input type="number" name="PorcentajeHumedad" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
																		</div>
													        		</div>
													        	</div>
												        	</div>
												    	</div>

												    </div>
												</aside>
											</div>										
										</div>
									</form>								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- SHOP END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>
