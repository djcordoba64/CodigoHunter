<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CLIENTES_FINCAS- -->
<a href="<?php echo RUTA_URL;?>/Clientes/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
<div class="col-md-12">
	<h2>Agregar nueva finca</h2>
</div>
<section class="cart-wrap">	
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Fincas/agregar_finca" method="POST">
				<input  name="idCliente" value="<?php echo isset($datos['idPersona'])? $datos['idPersona'] : '';?>">
					
				
				<!--array de fincas en una cadena de json-->
				<div class="row">
					<div id="customer_details">
						<div class="woocommerce-billing-fields">
							<div class="col-md-6" >
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
								<input type="text" class="input-text" name="vereda" autofocus="autofocus" value="<?php echo isset($datos['vereda'])? $datos['vereda'] : '';?>" onkeypress="return soloLetras(event);" id="vereda" >
								</p>
								<!--Coordenadas Google-->  										       
								<p class="form-row form-row-wide" validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
									<label for="billing_company" class="">Coordenadas Google:</label>
									<input type="text" class="input-text"  name="coordenadasGoogle" autofocus="autofocus" value="<?php echo isset($datos['coordenadasGoogle'])? $datos['coordenadasGoogle'] : '';?>">	
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

							 <input value="Guardar" class="btn  btn-brown" type="submit">
							 <input value="Cerrar" class="btn btn-default" type="button" onclick="window.close();">
							</div>
						</div>
					</div>										
				</div>
			</form>
		</div>
	</div>
</section>   

<!-- CLIENTES_FINCAS- -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 