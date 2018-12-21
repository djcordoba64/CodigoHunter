<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<!-- CART --> 

<h2>Recepción de café</h2>
	<section class="cart-wrap  product-single">
		
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout">
				<div class="container">
					<div class="row" >
						<div class="col-md-6 form-sect">
							<div class="title-form-sect">Datos básicos</div>							
							    <div class="woocommerce-billing-fields">
							        <div class="woocommerce-billing-fields__field-wrapper">
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
										<!--en el input hidden tare el id del cliente-->
										<input type="hidden" name="numeroContacto" value="<?php echo $datos["numeroContacto"] ?>" >
										<!--hidden para guardar temporalmente los lotes de cafe que se van creando y poder guardarlas todas al final junto con el cliente y la finca-->	
										<input type="hidden" name="lotesJson" value='<?php echo isset($datos['lotesJson'])? $datos['lotesJson'] : '';?>'><!--array de lotes de cafe en una cadena de json-->
										<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
										<input type="hidden" name="idLoteCafe" value="<?php echo isset($datos['idLoteCafe'])? $datos['idLoteCafe'] : '-1';?>" >
							        	<!--MATERIA PRIMA-->												            
											<p class="form-row form-row-wide address-field update_totals_on_change validate-required" >
												 <label for="materia">Materia Prima<abbr class="required" title="required">*</abbr></label>
												<select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
													<option value="">Seleccione...</option>
												</select>
											</p>
										<div class="col-lg-12">
											<!--ESPECIE-->       	
											<p><label for="especie" class="">Especie<abbr class="required" title="required">*</abbr></label></p>
											<input class="input-radio" type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required> <label>Robusta</label>
											<input class="class="input-radio" type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?> > <label>Arábiga</label>
										</div>
										<!--VARIEDAD-->
										<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
											<label for="variedad">Variedad<abbr class="required" title="required">*</abbr></label>      
											<input class="input-text" type="text" name="variedad" id="variedad" onkeypress="return soloLetras(event);" id="variedad"  value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>" required>
										</p>
										<!--TIPO DE BENEFICIO-->
										 <p class="form-row form-row-last validate-required woocommerce-validated">
											<label for="beneficio">Tipo de beneficio<abbr class="required" title="required">*</abbr></label>
											<select name="beneficio" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
												<option value="">Seleccione...</option>
											</select>
										</p>						            
							        </div>
							    </div>								
						</div>
						<div class="col-md-6 " style="padding-top: 155px">
							<div class="col-md-12 form-sect">						
								<div class="title-form-sect">Mustreo</div>
								<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
									<div class="quantity">									
										<label for="peso" class="">Peso<span  style="color: #b89d64;font-size:17px"> Kg </span><abbr class="required" title="required">*</abbr></label>
										<input placeholder="Kg" type="number" name="peso"  min="1"  step="1" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>">
									</div>
								</div>
								<div class=" col-lg-5 col-md-4 col-sm-4 col-xs-4">
									<label for="factorRendimiento" class="">Factor rendimiento<abbr class="required" title="required">*</abbr></label>
										<div class="quantity">									
											<input type="number" name="factorRendimiento"  min="1"  step="1" value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>">
										</div>
								</div>
								<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<label for="PorcentajeHumedad" class="">Humedad<span  style="color: #b89d64;font-size:20px"> % </span><abbr class="required" title="required">*</abbr></label>
										<div class="quantity">									
											<input type="number"  placeholder="%" name="PorcentajeHumedad"  min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
										</div>
								</div>
								<div class=" col-lg-12">
									<label for="actividaAcuosa" class="">Actividad acuosa<span  style="color: #b89d64;font-size:20px"></span><abbr class="required" title="required">*</abbr></label>
										<div class="quantity">									
											<input type="number" name="actividaAcuosa"  min="1"  step="1" value="<?php echo isset($datos['actividaAcuosa'])? $datos['actividaAcuosa'] : '';?>">
										</div>
								</div>	
							</div>	
						</div>
						<div class="col-lg-8 col-md-3 col-sm-3 col-xs-3">
							<label for="cantidad" class="">Cantidad recibida<span  style="color: #b89d64;font-size:17px"> Kg </span><abbr class="required" title="required">*</abbr></label></label>
							<div class="quantity">									
								<input type="number" name="cantidad" min="1"  step="1" value="<?php echo isset($datos['cantidad'])? $datos['cantidad'] : '';?>" required>
							</div>
						</div>
						<div class=" col-lg-8 col-md-4 col-sm-4 col-xs-4">
							<!--Estado-->
							<p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
								<label for="estado">Estado<abbr class="required" title="required">*</abbr></label>
								<select name="estado" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true" required>
									<option value="">Seleccione..</option>
									<option value="recibido" <?php echo  (isset($datos['estado']) and $datos['estado'] == 'recibido') ? "selected='selected'":'' ?>>Recibido</option>
									<option value="rechazado"  <?php echo  (isset($datos['estado']) and $datos['estado'] == 'rechazado') ? "selected='selected'":'' ?>>Rechazado</option>
								</select>
							</p>
						</div>
					</div>
					<hr>
					<div class="col-md-12 woocommerce-billing-fields">
						
						<!--FORMA DE ENTREGA DEL CAFÉ-->
						<div class="col-md-12">
							<aside class="shop-sidebar">
								<div class="widget-area">												    	
									<div  class="widget-container woocommerce widget_shopping_cart">
										<div class="art_list product_list_widget ">
											<div style="text-align: center"><h3 >Forma de entrega</h3><hr></div>
												<!--Molida-->
												<div style="text-align: center"><label style="color: #b89d64;font-size:20px;"><span>Molida</span></label></div>
													<div class="mini_cart_item"><!--Molida-->

														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="border-right: 4px solid #b89d64;">
															<div class="col-lg-12" style="text-align: center;background-color:#b89d64;border-radius: 15px;"><span style="color: #fff; font-weight: bold;">Libra ( lb )</span ></div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 10px">
																<label for="molidaLibra" class="">Cantidad</label>
															<div class="quantity" >									
													            <input type="number" placeholder="lb" name="molidaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaLibra'])? $datos['molidaLibra'] : '';?>"">
															</div>
															</div>
															
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding: 10px">
																<label for="molidaLibra" class="">Valor</label>
																<input type="text" name="" placeholder="$" class="" style="height:35px;">
															</div>
														</div>
														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4"  style="border-right: 4px solid #b89d64;border-radius: 15px;">
															<label for="molidaMediaLibra" class="">1/2 Lb</label>
															<div class="quantity">									
												                <input type="number" name="molidaMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>">
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																<label for="molidaLibra" class="">Valor</label>
																<input type="text" name="">
															</div>
														</div>
														<!--CINCO LIBRAS-->
														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4"  style="border-right: 4px solid #b89d64;border-radius: 15px;">
															<label for="molidaCincoLibras" class="">5 lb</label>
															<div class="quantity">									
												                <input type="number" name="molidaCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaCincoLibras'])? $datos['molidaCincoLibras'] : '';?>">
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																<label for="molidaLibra" class="">Valor</label>
																<input type="text" name="">
															</div>
														</div>													                   
													</div>
													<!--GRANO-->
													<div style="text-align: center"><label style="color: #b89d64;font-size:20px;"><span>Grano</span></label></div>
														<div class="mini_cart_item ">
															 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4"  style="border-right: 4px solid #b89d64;border-radius: 15px;">
																<label for="granoLibra" class="">lb</label>
																<div class="quantity">									
												                    <input type="number" name="granoLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoLibra'])? $datos['granoLibra'] : '';?>">
																</div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																	<label for="molidaLibra" class="">Valor</label>
																	<input type="text" name="">
																</div>
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4"  style="border-right: 4px solid #b89d64;border-radius: 15px;">
																<label for="granoMediaLibra" class="">1/2 Lb</label>
																<div class="quantity">									
												                    <input type="number" name="granoMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoMediaLibra'])? $datos['granoMediaLibra'] : '';?>"/>
																</div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																	<label for="molidaLibra" class="">Valor</label>
																	<input type="text" name="">
																</div>
															</div>
															<!---->
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4"  style="border-right: 4px solid #b89d64;border-radius: 15px;">
																<label for="granoCincoLibras" class="">5 lb</label>
																<div class="quantity">									
												                   <input type="number" name="granoCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoCincoLibras'])? $datos['granoCincoLibras'] : '';?>">
																</div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																	<label for="molidaLibra" class="">Valor</label>
																	<input type="text" name="">
																</div>
															 </div>
														</div>
														<!--AGRANEL-->
														
														<div class="mini_cart_item ">													
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																<div style="text-align: center"><label style="color: #b89d64;font-size:20px;"><span>Agranel</span></label></div>
																<div class="quantity">									
														            <input type="number" name="agranel" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['agranel'])? $datos['agranel'] : '';?>">
																</div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																	<label for="molidaLibra" class="">Valor</label>
																	<input type="text" name="">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</aside>
									</div>

					</div>
				</div>		
			</form>
		</div>
	</section>
	<!-- CART END --> 
<section>
	<div class="cafe-Agregar-recepcion product-single">					
		<div class="col-md-12" ><h2 >Recepción del café</h2></div>
		<div class="container">						
			<div class="row">
				<form class="checkout woocommerce-checkout" id="form1" method="POST" >
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
					<!--en el input hidden tare el id del cliente-->
					<input type="hidden" name="numeroContacto" value="<?php echo $datos["numeroContacto"] ?>" >
					<!--hidden para guardar temporalmente los lotes de cafe que se van creando y poder guardarlas todas al final junto con el cliente y la finca-->	
					<input type="hidden" name="lotesJson" value='<?php echo isset($datos['lotesJson'])? $datos['lotesJson'] : '';?>'><!--array de lotes de cafe en una cadena de json-->
					<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
					<input type="hidden" name="idLoteCafe" value="<?php echo isset($datos['idLoteCafe'])? $datos['idLoteCafe'] : '-1';?>" >
					<!--DATOS DEL CAFÉ-->
					<div class="col-md-12">
						<div id="customer_details">
							<div class="woocommerce-billing-fields">
								<div class="woocommerce-billing-fields__field-wrapper">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"">
										<!--MATERIA PRIMA-->												            
										<p class="form-row form-row-first validate-required" data-priority="100">
											 <label for="materia">Materia Prima<abbr class="required" title="required">*</abbr></label>
											<select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
												<option value="">Seleccione...</option>
											</select>
										</p>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<!--ESPECIE-->       	
										<p><label for="billing_first_name" class="">Especie<abbr class="required" title="required">*</abbr></label></p>
										<input class="input-radio" type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required> <label>Robusta</label>
										<input class="class="input-radio"" type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?> > <label>Arábiga</label>
									</div>			
									</div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
										<!--VARIEDAD-->
									<p class="form-row form-row-first validate-required " id="" data-priority="100">
										<label for="variedad">Variedad<abbr class="required" title="required">*</abbr></label>      
										<input class="input-text" type="text" name="variedad" id="variedad" onkeypress="return soloLetras(event);" id="variedad"  value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>" required>
									</p>
									</div>
								
										
									
								
								
								
								
														  
														   
														    <!--TIPO DE BENEFICIO-->
														    <p class="form-row form-row-last validate-required woocommerce-validated"  data-priority="20">
														        <label for="">Tipo de beneficio<abbr class="required" title="required">*</abbr>
														        </label>
														        <select name="beneficio" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true">
														            <option value="">Seleccione...</option>
														        </select>
														    </p><br>												            
														    
														</div>
													</div>
													<!---->
													<hr>
													<div>
														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														    <label for="factorRendimiento" class="">Factor rendimiento<abbr class="required" title="required">*</abbr></label>
														    <div class="quantity">									
									                           	<input type="number" name="factorRendimiento"  min="1"  step="1" value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>">
															</div>
														</div>
														<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
														    <label for="PorcentajeHumedad" class="">Humedad<span  style="color: #b89d64;font-size:20px"> % </span><abbr class="required" title="required">*</abbr></label>
														    <div class="quantity">									
									                           	<input type="number" name="PorcentajeHumedad"  min="1"  step="1" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>">
															</div>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<div class="quantity">									
									                        	<label for="peso" class="">Peso<span  style="color: #b89d64;font-size:17px"> Kg </span><abbr class="required" title="required">*</abbr></label><input type="number" name="peso"  min="1"  step="1" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>">
															</div>
														</div><br>
													</div><hr>
													<!---->
													<div style="margin: 50px;">
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
															<label for="cantidad" class="">Cantidad<abbr class="required" title="required">*</abbr></label>
															<div class="quantity">									
										                        <input type="number" name="cantidad"  min="1"  step="1" value="<?php echo isset($datos['cantidad'])? $datos['cantidad'] : '';?>" required>
															</div>
														</div>
														<div class="input-group">												        	 
															<label for="valorUnitario" class="">Valor <span  style="color: #b89d64;font-size:20px"> $ </span><abbr class="required" title="required">*</abbr></label>
															<input type="text" style="background-color: #F6F0E4" class="form-control" name="valorUnitario"  onkeypress="return SoloNumeros(event);" id="valorUnitario" value="<?php echo isset($datos['valorUnitario'])? $datos['valorUnitario'] : '';?>"  required >
														</div>
													</div>
													<!---->
													<p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
														<label for="estado">Estado<abbr class="required" title="required">*</abbr></label>
														<select name="estado" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true" required>
														    <option value="">Seleccione..</option>
												    		<option value="recibido" <?php echo  (isset($datos['estado']) and $datos['estado'] == 'recibido') ? "selected='selected'":'' ?>>Recibido</option>
												   			<option value="rechazado"  <?php echo  (isset($datos['estado']) and $datos['estado'] == 'rechazado') ? "selected='selected'":'' ?>>Rechazado</option>
												   		</select>
													</p>												
												</div>
											</div>
											<!--FORMA DE ENTREGA DEL CAFÉ-->
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
																        <label for="molidaLibra" class="">lb</label>
																	    <div class="quantity">									
												                           <input type="number" name="molidaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaLibra'])? $datos['molidaLibra'] : '';?>"">
																		</div>
															        </div>
															        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																        <label for="molidaMediaLibra" class="">1/2 Lb</label>
																	    <div class="quantity">									
												                           	<input type="number" name="molidaMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>">
																		</div>
															        </div>
															       	<!--CINCO LIBRAS-->
															        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																        <label for="molidaCincoLibras" class="">5 lb</label>
																	    <div class="quantity">									
												                           	<input type="number" name="molidaCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaCincoLibras'])? $datos['molidaCincoLibras'] : '';?>">
																		</div>
															        </div>													                   
															    </div>
															    <!--GRANO-->
															    <label style="color: #b89d64;font-size:20px"><span>Grano</span></label>
															    <div class="mini_cart_item ">
															        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																        <label for="granoLibra" class="">lb</label>
																	    <div class="quantity">									
												                           	<input type="number" name="granoLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoLibra'])? $datos['granoLibra'] : '';?>">
																		</div>
															       	</div>
															        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																        <label for="granoMediaLibra" class="">1/2 Lb</label>
																	    <div class="quantity">									
												                           	<input type="number" name="granoMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoMediaLibra'])? $datos['granoMediaLibra'] : '';?>"/>
																		</div>
															        </div>
															        <!---->
															        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																      	<label for="granoCincoLibras" class="">5 lb</label>
																	    <div class="quantity">									
												                           <input type="number" name="granoCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoCincoLibras'])? $datos['granoCincoLibras'] : '';?>">
																		</div>
															        </div>
															    </div>
															   <!--AGRANEL-->
															    <label style="color: #b89d64;font-size:20px"><span>Agranel</span></label>
																<div class="mini_cart_item ">													
																	<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
																	    <label for="agranel" class="">Agranel</label>
																		<div class="quantity">									
													                       	<input type="number" name="agranel" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['agranel'])? $datos['agranel'] : '';?>">
																		</div>
																    </div>
															    </div>
														    </div>
														 </div>
													</div>
												</aside>
											</div>
											<!--Boton submit-->
											<div class="col-md-12 " style="margin: 20px;">
												<div class="col-md-6 text-right">
												<!--<input class="btn btn-lg btn-brown" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>" >-->
												<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
												<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_guardar_temporalmente',true)" class="btn btn-lg btn-brown" type="button" value="<?php echo (isset($datos['idLoteCafe']) and $datos['idLoteCafe'] !='-1')? "Guardar Cambios" : "Agregar +";?>">
												</div>
											</div>
											<!--DIV PARA LA TABLA DE LOS CAFES AGREGADOS A LA RECEPCIÓN-->
											<div class="col-md-12" >
												<div class="col-md-12"><h4>Cafés agregados en la recepción</h4></div>
												<!--TABLA CAFE-->
												<table class="shop_table shop_table_responsive cart"  >
													<thead>
														<tr>
														    <!--<th class="product-remove">Codigo</th>-->
															<th style="font-size:14px" class="product-remove">Peso</th>
															<th style="font-size:14px" class="product-remove">Especie</th>
															<th style="font-size:14px" class="product-remove">Variedad</th>
															<th style="font-size:14px" class="product-remove">Humedad</th>
															<th style="font-size:14px" class="product-remove">Factor rendimiento</th>
															<th style="font-size:14px" class="product-remove">Tipo tueste</th>
															<th style="font-size:14px" class="product-remove">Cantidad</th>
															<th style="font-size:14px" class="product-remove">Valor</th>
															<th style="font-size:14px" class="product-remove">Estado</th>
															<th style="font-size:14px" class="product-remove">Acciones</th>
														</tr>
													</thead>
													<tbody class="cart_item">
													<?php if (isset($datos['lotesArr'])) { foreach($datos['lotesArr'] as $cafe): ?>
														<tr class="">
															<!--<td class="product-remove">					
															<//?php echo $cafe['codigoCafe']?>								
															</td>-->
															<td class="product-remove">					
																<?php echo $cafe['peso']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['especie']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['variedad']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['PorcentajeHumedad']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['factorRendimiento']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['tipoTueste']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['cantidad']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['valorUnitario']?>								
															</td>
															<td class="product-remove">					
																<?php echo $cafe['estado']?>								
															</td>
															<td class="product-remove">
																<!--boton de editar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
																<div class="col-md-6">
																	<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_editar_temporal/<?php echo $cafe["idLoteCafe"];?>')" class="btn btn-sm btn-default" type="button" value="Editar">
																</div>
																<div class="col-md-6">
																	<input align="center"  class="btn btn-sm btn-bordered" type="button" value="Eliminar">
																</div>	
															</td>
															</tr>
														<?php endforeach; }?>
													</tbody>
												</table>
												<div class="col-md-12" style="margin: 20px;">
													<div class="col-md-6 text-right " >
														<?php if (isset($datos['lotesArr']) and count($datos['lotesArr'])>0) { ?>					 <a href="<?php echo RUTA_URL;?>/paginas/index" class="btn btn-lg btn-bordered">Cancelar</a>	<?php }  ?>
													</div>
													<div class="col-md-6 text-left " >
														<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
														<?php if (isset($datos['lotesArr']) and count($datos['lotesArr'])>0) { ?>
															<input onclick="submitForm('<?php echo RUTA_URL;?>/Recepciones/crear_guardar')" class="btn btn-lg btn-default" type="button" value="Guardar">
														<?php }     ?>
													</div>
												</div>
											</div>										
										</form>
			</div>																				
		</div>							
	</div>
</section>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>
