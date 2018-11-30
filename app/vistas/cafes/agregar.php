<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<section class="product-single">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout">
			<div class="container">
				<form id="form1" method="POST">
					<div class="row">
						<div class="col-md-12">
						<div class="col-md-6"><h3>Datos del cafe</h3></div>
						</div>
						<div class="col-md-5">
							<div id="customer_details">
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
										<!--hidden para guardar temporalmente los lotes de cafe que se van creando y poder guardarlas todas al final junto con el cliente y la finca-->	
										<input type="hidden" name="lotesJson" value='<?php echo isset($datos['lotesJson'])? $datos['lotesJson'] : '';?>'><!--array de lotes de cafe en una cadena de json-->
										<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
										<input type="hidden" name="idLoteCafe" value="<?php echo isset($datos['idLoteCafe'])? $datos['idLoteCafe'] : '-1';?>" >
										<!--datos del café lado izquierdo-->
										<!--Peso-->
							            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="" data-priority="10">
							                <label for="peso" >Peso Gr <abbr class="required" title="required">*</abbr>
							                </label>
							                <input class="input-text " name="peso" id="peso" autofocus="autofocus" autocomplete="given-name"  type="number" min="1" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>" required>
							            </p>
							            <!--Variedad-->
							            <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
							                <label for="variedad" >Variedad <abbr class="required" title="required">*</abbr>
							                </label>
							                <input class="input-text " name="variedad" type="text" onkeypress="return soloLetras(event);" id="variedad"  required  autocomplete="family-name"  value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>">
							            </p>
							            <!--Tipo de tueste-->
							            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="" data-priority="10">
							                <label for="tipoTueste">Tipo de tueste <abbr class="required" title="required">*</abbr>
							                </label>
							                <input class="input-text" onkeypress="return soloLetras(event);" type="text" name="tipoTueste" id="tipoTueste" autofocus="autofocus" autocomplete="given-name" value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>" required>
							            </p>
							            <!--Porcentaje de humedad-->
							            <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
							                <label for="PorcentajeHumedad">Porcentaje de huemdad ()<abbr class="required" title="required">*</abbr>
							                </label>
							                <input class="input-text" autocomplete="family-name"  min="1"  name="PorcentajeHumedad" id="PorcentajeHumedad" type="number"  value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>" required>
							            </p>
							            <!--Materia prima-->
							            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
							                <label for="materia">Materia prima <abbr class="required" title="required">*</abbr>
							                </label>
							                <select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
							                    <option value="">Seleccione...</option>
							                </select>						            	
							            </p>
							            <!--Tipo de beneficio-->
							            <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
							                <label for="">Tipo beneficio<abbr class="required" title="required">*</abbr>
							                </label>
							                <select name="beneficio" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true">
							                    <option value="">Seleccione...</option>
							                    
							                </select>
							            </p>
							           <!--Factor de rendimiento-->
							            <p class="form-row form-row-first validate-required validate-phone" id="" data-priority="100">
							                <label for="factorRendimiento">Factor de rendimiento <abbr class="required" title="required">*</abbr>
							                </label>
							                <input class="input-text " name="factorRendimiento" id="factorRendimiento"  autocomplete="tel" type="number" required value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>">
							            </p>
							            <!--Especie-->
							             <p class="form-row form-row-last validate-required woocommerce-validated" id="" data-priority="20">
							             	<div class="col-md-7" >
							             		<label for="especie" class="">Especie <abbr class="required" title="required">*</abbr></label>
							             		 <ul>
									            <li>									        
											        <input type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required>Robusta
											        <input type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?>>Arábiga
										         </li>
									        </ul>
							             	</div>
							            </p>
							        </div>
							 	</div>

				
							</div >	
						</div>
						<div class="col-md-5 col-md-offset-1">
							<p>Aqui va la foto</p>
						</div>

					</div>
					<div class="row">
						<div class="col-md-12 "  >
							<div class="order_box" >
							    <div id="order_review" class="woocommerce-checkout-review-order" >
							        <div id="payment" class="woocommerce-checkout-payment" >
							        	<div class="col-md-12" style="background-color:#fff">
							        		  <h6 id="order_review_heading">Molida</h6>
								        	<!--MOLIDA-->
								        	<!--molida Libra Cantidad-->
								        	<div class="col-md-6">
								        		<div class="col-md-4">
								        			<p >
									                <div class="quantity">
									                	<label for="molidaLibra" class="">lb</label>
		                            					<input type="number" min="1"  name="molidaLibra" id="molidaLibra" value="0">
		                       						 </div>							                
								            		</p>
								        		
								        		<div class="col-md-4">
								        			<p class="form-row form-row-first " id="billing_first_name_field" data-priority="10">
								             		 <label for="billing_first_name" class="">Vr unitario</label>
								                	<input class="input-text " name="VrmolidaLibra" id="molidaMediaLibra"  autocomplete="given-name" autofocus="autofocus" type="number" value="<?php echo isset($datos['VrmolidaLibra'])? $datos['VrmolidaLibra'] : '';?>"" >
								            		</p>
	                       						</div>
								        	</div>
								        	<!--molida media Libra Cantidad-->
								        	<div class="col-md-4">
								        		<div class="col-md-4">
								        			<p >
									                <div class="quantity">
									                	<label for="molidamediaLibra" class="">1/2 lb</label>
		                            					<input type="number" min="1"  name="molidaLibra" id="molidaLibra" value="0">
		                       						 </div>							                
								            		</p>
								        		</div>
								        		<div class="col-md-8">
								        			<p class="form-row form-row-first " id="billing_first_name_field" data-priority="10">
								             		 <label for="billing_first_name" class="">Vr unitario</label>
								                	<input class="input-text " name="molidaMediaLibra" id="molidaMediaLibra"  autocomplete="given-name" autofocus="autofocus" type="number" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>"" >
								            		</p>
	                       						</div>
								        	</div>
								        	<!--molida cinco Libras Cantidad-->
								        	<div class="col-md-4">
								        		<div class="col-md-4">
								        			<p >
									                <div class="quantity">
									                	<label for="molidamediaLibra" class="">5 lb</label>
		                            					<input type="number" min="1"  name="molidaLibra" id="molidaLibra" value="0">
		                       						 </div>							                
								            		</p>
								        		</div>
								        		<div class="col-md-8">
								        			<p class="form-row form-row-first " id="billing_first_name_field" data-priority="10">
								             		 <label for="billing_first_name" class="">Vr unitario</label>
								                	<input class="input-text " name="molidaMediaLibra" id="molidaMediaLibra"  autocomplete="given-name" autofocus="autofocus" type="number" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>"" >
								            		</p>
	                       						</div>
								        	</div>
								        </div>
								        
								     

							        </div>

							    </div>
							</div>
						</div>
					</div>
				</form>
			</div>
		
		</form>
		</div>
</section>


<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">
				<!--FORMULAIO DEL CAFÉ-->	
				
				<form id="form1" method="POST">													
				<div class="contact-form">
					<div class="row" style="background-color:#fff" >
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
						<!--datos del café lado izquierdo-->														
						<div class="col-md-6">
							<h4>Datos del café</h4>
							<div class="col-md-12" >
								<!--<label for="" class="">Codigo</label>
								<input type="text" name="codigoCafe" disabled >	-->					
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Peso Gr</label>
										<input class="contact-input" type="number" name="peso" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>" required>
									</p>
								</div>
								<div  class="col-md-6">
									<label for="" class="">Variedad</label>
										<input class="contact-input" type="text"  name="variedad" onkeypress="return soloLetras(event);" id="variedad"  value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>" required>											
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Tipo de tueste</label>
										<input class="contact-input" type="text" onkeypress="return soloLetras(event);" id="tipoTueste" name="tipoTueste" value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>"  required>
									</p>
								</div>
								<div  class="col-md-6">
									<label>Materia prima:</label>
									<select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" required>
										   	<option value="">Seleccione..
										    </option>
										</select>																				
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<label>Tipo de beneficio:</label>
									<select name="beneficio" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country"  required>
										   	<option value="">Seleccione..
										    </option>
										</select>
								</div>
								<div  class="col-md-6">
									<p>
										<label for="" class="">Porcentaje de humedad</label>
										<input class="contact-input" min="1" type="number"  name="PorcentajeHumedad" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>" required>
									</p>																				
								</div>
								<div class="col-md-6">
									<p>
										<label for="" class="">Factor de rendimiento</label>
										<input class="contact-input" type="number" min="10" max="17" name="factorRendimiento" value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>"  required>
									</p>
								</div>
								<div class="col-md-6">
									<p>
										<label for="billing_first_name" class="">Especie:</abbr></label>
										<ul>
								            <li>									        
										        <input type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required>Robusta
										        <input type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?>>Arábiga
									         </li>
								        </ul>
									</p>	
								</div>
							</div>
						</div>
						<!--datos del café lado derecho-->
						<div class="col-md-6" >
							<div class="col-md-12" >
							    <h4>Forma de entrega</h4>
							    <div class="description">Especificar si es en Grano o Molido y como se empaca.</div >
							    <h6 align="center">Molida</h6>
							    <div class="col-md-12">



								    <div class="col-md-6">
										Libra:<input class="contact-input" type="number" name="molidaLibra" value="<?php echo isset($datos['molidaLibra'])? $datos['molidaLibra'] : '';?>" >
								     </div>
								     <div class="col-md-6">
										Vr Unitario<input  type="text"  name="MLvrUnitario" value="<?php echo isset($datos['MLvrUnitario'])? $datos['MLvrUnitario'] : '';?>"  >
								    </div>

							    </div>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
									<input class="contact-input" type="number" name="molidaMediaLibra" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>"  >
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="molidaCincoLibras" value="<?php echo isset($datos['molidaCincoLibras'])? $datos['molidaCincoLibras'] : '';?>"  >
							    </p>
							    <h6 align="center">En grano</h6>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							            <label for="" class="">Libra</label>
										<input class="contact-input" type="number" name="granoLibra" value="<?php echo isset($datos['granoLibra'])? $datos['granoLibra'] : '';?>"  >
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
										<input class="contact-input" type="number" name="granoMediaLibra" value="<?php echo isset($datos['granoMediaLibra'])? $datos['granoMediaLibra'] : '';?>"  >
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="granoCincoLibras" value="<?php echo isset($datos['granoCincoLibras'])? $datos['granoCincoLibras'] : '';?>" >
							    </p>
							</div>
							<div class="col-md-12" >
								<div  class="col-md-6">
									<label for="" class="">Cantidad</label>
										<input class="contact-input" type="number"  name="cantidad" value="<?php echo isset($datos['cantidad'])? $datos['cantidad'] : '';?>"  required>
								</div>
								<div  class="col-md-6" >
									<label for="" class="">Valor unitario</label>
										<input class="contact-input" type="text"  name="valorUnitario"  onkeypress="return SoloNumeros(event);" id="valorUnitario" value="<?php echo isset($datos['valorUnitario'])? $datos['valorUnitario'] : '';?>"  required>											
								</div>
								<div  class="col-md-6">
									<label>Estado:</label>
									<select name="estado" id="estado" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country"  required>
										   	<option value="">Seleccione..
										    </option>
										    <option value="recibido" <?php echo  (isset($datos['estado']) and $datos['estado'] == 'recibido') ? "selected='selected'":'' ?>>Recibido</option>
										    <option value="rechazado"  <?php echo  (isset($datos['estado']) and $datos['estado'] == 'rechazado') ? "selected='selected'":'' ?>>Rechazado</option>
										</select>																				
								</div>								
							</div>
							<!--Boton submit-->
							<div class="col-md-6 text-center" style="margin: 20px;">
								<!--<input class="btn btn-lg btn-brown" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>" >-->
								<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
								<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_guardar_temporalmente',true)" class="btn btn-lg btn-brown" type="button" value="<?php echo (isset($datos['idLoteCafe']) and $datos['idLoteCafe'] !='-1')? "Guardar Cambios" : "Agregar";?>">
					
							</div>
						</div>																				
					</div>					
				</div>
				<div class="contact-form"  style="background-color:#fff">
					<div style="background-color:#fff">
						<div class="col-md-12">
							<h4>Cafés agregados a la recepción</h4>
						</div>
						<!--TABLA CON EL CAFE(S) AGREGADOS A LA RECEPCIÓN-->
						<table class="shop_table shop_table_responsive cart"  >
							<thead>
								<tr>
							        <!--<th class="product-remove">Codigo</th>-->
									<th style="font-size:18px" class="product-remove">Peso</th>
									<th style="font-size:18px" class="product-remove">Especie</th>
									<th style="font-size:18px" class="product-remove">Variedad</th>
									<th style="font-size:18px" class="product-remove">Humedad</th>
									<th style="font-size:18px" class="product-remove">Factor rendimiento</th>
									<th style="font-size:18px" class="product-remove">Tipo tueste</th>
									<th style="font-size:18px" class="product-remove">Cantidad</th>
									<th style="font-size:18px" class="product-remove">Valor</th>
									<th style="font-size:18px" class="product-remove">Estado</th>
									<th style="font-size:18px" class="product-remove">Acciones</th>
							    </tr>
							</thead>
							<tbody class="cart_item">
								<?php if (isset($datos['lotesArr'])) { foreach($datos['lotesArr'] as $cafe): ?>
								<tr class="">
									<!--<td class="product-remove">					
										<?php echo $cafe['codigoCafe']?>								
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
					</div>
				</div>	
				<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
				<?php if (isset($datos['lotesArr']) and count($datos['lotesArr'])>0) { ?>

					<div style="margin: 20px;" align="center">
					<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Recepciones/crear_guardar')" class="btn btn-lg btn-brown" type="button" value="finalizar">
					</div>
				<?php }     ?>
				</form>				
			</div>
		</div>
	</div>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 
