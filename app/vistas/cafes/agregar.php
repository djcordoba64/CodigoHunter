<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<!-- CART --> 

<h2>Recepción de café</h2>
	<section class="cart-wrap  product-single">		
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" id="form1" method="POST">
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
										<!--TIPO DE TUESTE-->
										<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
											<label for="tipoTueste">Tipo de tueste<abbr class="required" title="required">*</abbr></label>      
											<input class="input-text" type="text" name="tipoTueste" id="tipoTueste" onkeypress="return soloLetras(event);" id="tipoTueste"  value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>" required>
										</p>
															            
							        </div>
							    </div>								
						</div>
						<div class="col-md-6 " style="padding-top: 156px">
							<div class="col-md-12 form-sect">						
								<div class="title-form-sect">Mustreo</div>
								<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
									<div class="quantity">									
										<label for="pesoMuestra" class="">Peso<span  style="color: #b89d64;font-size:17px"> Kg </span><abbr class="required" title="required">*</abbr></label>
										<input placeholder="Kg" type="number" name="pesoMuestra"  min="1"  step="1" value="<?php echo isset($datos['pesoMuestra'])? $datos['pesoMuestra'] : '';?>">
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
									<label for="actividadAcuosa" class="">Actividad acuosa<span  style="color: #b89d64;font-size:20px"></span><abbr class="required" title="required">*</abbr></label>
										<div class="quantity">									
											<input type="number" name="actividadAcuosa"  min="1"  step="1" value="<?php echo isset($datos['actividadAcuosa'])? $datos['actividadAcuosa'] : '';?>">
										</div>
								</div>	
							</div>
							<div class="col-lg-5 col-md-3 col-sm-3 col-xs-3" style="padding: 20px">
								<label for="pesoRecibido" class="">Cantidad recibida<span  style="color: #b89d64;font-size:17px"> Kg </span><abbr class="required" title="required">*</abbr></label></label>
								<div class="quantity">									
									<input type="number" name="pesoRecibido" min="1"  step="1" value="<?php echo isset($datos['pesoRecibido'])? $datos['pesoRecibido'] : '';?>" required>
								</div>
							</div>
							<div class=" col-lg-7 col-md-4 col-sm-4 col-xs-4" style="padding: 22px">
								<!--Estado-->
								<p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
									<label for="estado">Estado<abbr class="required" title="required">*</abbr></label>
									<select name="estado" id="materia" style="width: 120%" class="country_to_state country_select select2-hidden-accessible"  tabindex="-1" aria-hidden="true" required>
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
													<!--Molida--->
														<div class="nom"><label class="lbdescrip"><span>Molida</span></label></div>
														<div class="mini_cart_item">
															<!--MOLIDA-->
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Libra ( lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="molidaLibra" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="molidaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaLibra'])? $datos['molidaLibra'] : '';?>"">
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrmolidaLibra" class="">Valor</label>
																	<input type="text" name="VrmolidaLibra" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrmolidaLibra'])? $datos['VrmolidaLibra'] : '';?>" id="VrmolidaLibra" onchange="sumar();">
																</div>
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Media Liba (1/2 lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="molidaMediaLibra" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="molidaMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>">
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrmolidaMediaLibra" class="">Valor</label>
																	<input type="text" name="VrmolidaMediaLibra" placeholder="$" class="inp-valor monto"  value="<?php echo isset($datos['VrmolidaMediaLibra'])? $datos['VrmolidaMediaLibra'] : '';?>" id="VrmolidaMediaLibra" onchange="sumar();" >
																</div>
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Cinco Libas (5 lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="molidaCincoLibras" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="molidaCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['molidaCincoLibras'])? $datos['molidaCincoLibras'] : '';?>">
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrmolidaCincoLibras" class="">Valor</label>
																	<input type="text" name="VrmolidaCincoLibras" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrmolidaCincoLibras'])? $datos['VrmolidaCincoLibras'] : '';?>" id="VrmolidaCincoLibras" onchange="sumar();">
																</div>
															</div>
														</div>
													<!--GRANO-->
													<div class="nom"><label class="lbdescrip"><span>Grano</span></label></div>
														<div class="mini_cart_item">
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Libra ( lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="granoLibra" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="granoLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoLibra'])? $datos['granoLibra'] : '';?>">
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrgranoLibra" class="">Valor</label>
																	<input type="text" name="VrgranoLibra" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrgranoLibra'])? $datos['VrgranoLibra'] : '';?>"  id="VrgranoLibra" onchange="sumar();" >
																</div>
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Media Liba (1/2 lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="granoMediaLibra" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="granoMediaLibra" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoMediaLibra'])? $datos['granoMediaLibra'] : '';?>">
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrgranoMediaLibra" class="">Valor</label>
																	<input type="text" name="VrgranoMediaLibra" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrgranoMediaLibra'])? $datos['VrgranoMediaLibra'] : '';?>" onchange="sumar();">
																</div>
															</div>
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="col-lg-12 title-opc" style=""><span class="opcion-nombre">Cinco Libas (5 lb )</span ></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="granoCincoLibras" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="granoCincoLibras" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['granoCincoLibras'])? $datos['granoCincoLibras'] : '';?>" >
																	</div>
																</div>
																	 <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="VrgranoCincoLibras" class="">Valor</label>
																	<input type="text" name="VrgranoCincoLibras" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrgranoCincoLibras'])? $datos['VrgranoCincoLibras'] : '';?>" id="VrgranoCincoLibras"  onchange="sumar();">
																</div>
															</div>
														</div>
														<!--AGRANEL-->
														<div class="mini_cart_item">
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 set-entrega">
																<div class="nom"><label class="lbdescrip"><span>Agranel</span></label></div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant" >
																	<label for="agranel" class="">Cantidad</label>
																	<div class="quantity" >									
															            <input type="number" placeholder="lb" name="agranel" style="background-color: #fff" min="1"  step="1" value="<?php echo isset($datos['agranel'])? $datos['agranel'] : '';?>">
																	</div>
																</div>
																<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="Vragranel" class="">Valor</label>
																	<input type="text" name="VrAgranel" placeholder="$" class="inp-valor monto" value="<?php echo isset($datos['VrAgranel'])? $datos['VrAgranel'] : '';?>" id="VrAgranel"  onchange="sumar();" >
																</div>
															</div>
														</div>
														<div class="mini_cart_item">
															<div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4 div-cant">
																	<label for="valorTotal" class="">Valor Total</label>
																	<input type="text"   name="valorTotal" placeholder="$" class="inp-valor"  value="<?php echo isset($datos['valorTotal'])? $datos['valorTotal'] : '';?>" id="valorTotal">
																</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</aside>
								</div>
						</div>
						<!--Boton submit-->
						<div class="col-md-12 " style="margin: 20px;">
							<div class="col-md-6 text-right">
								<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
								<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_guardar_temporalmente',true)" class="btn btn-lg btn-brown" type="button" value="<?php echo (isset($datos['idLoteCafe']) and $datos['idLoteCafe'] !='-1')? "Guardar Cambios" : "Agregar +";?>">
							</div>
						</div>
						<!--DIV PARA LA TABLA DE LOS CAFES AGREGADOS A LA RECEPCIÓN-->
						<div class="col-md-12 text-page" >
							<div class="col-md-12" align="center"><h4 >Cafés agregados en la recepción</h4></div>
								<!--TABLA CAFE-->
								<table class="table table-bordered"  >
									<thead>
										<tr>
											 <!--<th class="product-remove">Codigo</th>-->
											<th style="font-size:14px" class="product-remove">Peso</th>
											<th style="font-size:14px" class="product-remove">Especie</th>
											<th style="font-size:14px" class="product-remove">Variedad</th>
											<th style="font-size:14px" class="product-remove">Humedad</th>
											<th style="font-size:14px" class="product-remove">Factor rendimiento</th>
											<th style="font-size:14px" class="product-remove">Tipo tueste</th>
											<th style="font-size:14px" class="product-remove">Actividad Acuosa</th>
											<th style="font-size:14px" class="product-remove">Valor total</th>
											<th style="font-size:14px" class="product-remove">Estado</th>
											<th style="font-size:14px" class="product-remove">Acciones</th>
										</tr>
									</thead>
									<tbody class="cart_item">
									<?php if (isset($datos['lotesArr'])) { foreach($datos['lotesArr'] as $cafe): ?>
										<tr class="">
											<!--<td class="product-remove"><//?php echo $cafe['codigoCafe']?></td>-->
											<td class="product-remove"><?php echo $cafe['pesoRecibido']?> Kg</td>
											<td class="product-remove"><?php echo $cafe['especie']?></td>
											<td class="product-remove"><?php echo $cafe['variedad']?></td>
											<td class="product-remove"><?php echo $cafe['PorcentajeHumedad']?> %</td>
											<td class="product-remove"><?php echo $cafe['factorRendimiento']?></td>
											<td class="product-remove"><?php echo $cafe['tipoTueste']?></td>
											<td class="product-remove"><?php echo $cafe['actividadAcuosa']?></td>
											<td class="product-remove"><?php echo $cafe['valorTotal']?></td>
											<td class="product-remove"><?php echo $cafe['estado']?></td>
											<td class="product-remove">
												<!--boton de editar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
												<div class="col-md-6">
													<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_editar_temporal/<?php echo $cafe["idLoteCafe"];?>')" class="btn btn-sm btn-default" type="button" value="Editar">
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
					</div>
				</div>		
			</form>
		</div>
	</section>
	<!-- CART END --> 


<?php require RUTA_APP . '/vistas/inc/footer.php' ?>
