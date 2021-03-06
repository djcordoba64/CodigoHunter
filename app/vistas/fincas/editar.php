<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CLIENTES_FINCAS- -->
<div class="col-md-12">
	<h2>Información de la finca</h2>
</div>

<section class="cart-wrap">	
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" id="form1" method="POST" action="<?php echo RUTA_URL;?>/Fincas/editar_finca_index/<?php echo $datos['idDetalleFinca']?>"">
				<p>
                    <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>              
                  </p>
				<div class="row">
					<div id="customer_details">
						<div class="woocommerce-billing-fields">
							<div class="col-md-6" >
					
								<!--Nombre de la finca--> 
								<p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
								<label for="billing_first_name" class="">Nombre de la finca:</label>
								<input    type="text" class="input-text" name="nombreFinca"  disabled value="<?php echo $datos['nombreFinca']?>">
								</p>
								<!--Departamento--> 										       
								<p class="form-row form-row-first "  >
									<label for="billing_country" class="">Departamento:</label>

									 <input type="text" class="input-text" name="departamento"  disabled value="<?php echo $datos['departamento']?>">    
								</p>	                
								<!--Municipio-->
								<p class="form-row form-row-last">
									<label for="billing_country" class="">Municipio:</label>
									 <input  type="text" class="input-text" name="municipio" disabled value="<?php echo $datos['municipio']?>"> 
								</p>
								<!--Vereda-->
								<p class="form-row form-row-wide" id="billing_company_field" data-priority="10">
									<label for="billing_first_name" class="">Vereda:</label>
									 <input  type="text" class="input-text" name="vereda"  disabled  value="<?php echo $datos['vereda']?>"> 
								</p>
								<!--Coordenadas Google-->  										       
								<p class="form-row form-row-wide" validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
									<label for="billing_company" class="">Coordenadas Google:</label>
									 <input type="text" class="input-text" name="coordenadasGoogle" autofocus="autofocus"  value="<?php echo $datos['coordenadasGoogle']?>"> 	
								</p>
								<div class="cold-md-12">
									<div class="col-md-4">
										<!--Temperatura-->
										<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
										<label for="billing_first_name">Temperatura<abbr class="required" title="required">			
											<input type="number" class="input-text" name="Temperatura" autofocus="autofocus" value="<?php echo $datos['Temperatura']?>"> 						
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
								<input value="Actualizar" class="btn btn-brown" type="submit">
								<input value="Cerrar" class="btn btn-bordered" type="button" onclick="window.close();">
								
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