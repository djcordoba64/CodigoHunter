<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<section class="cart-wrap">
	<div class="col-md-12">
		<h2>Información personal</h2>

	</div>
		<div class="container">
			<div class="woocommerce">
				<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Cliente/crear_validar_mostrar_fincas" method="POST">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div id="customer_details">
								    <div class="woocommerce-billing-fields">
								    	<p>
										<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>							 
			      						</p>						        
								        <div class="woocommerce-billing-fields__field-wrapper">
									        <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
									        <label for="billing_first_name" class="">Primer Nombre: <abbr class="required" title="required">*</abbr></label>
									        <input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required value="<?php echo $datos['primerNombre']?>">							
							  				</p>
										<p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
										    <label for="billing_last_name" class="">Segundo nombre:</label>
										    <input type="text" class="input-text" name="segundoNombre" autofocus="autofocus" value="<?php echo $datos['segundoNombre']?>">
										            
										</p>
										 <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
									    <label for="billing_first_name" class="">Primer Apellido: <abbr class="required" title="required">*</abbr>
									    </label>
									    <input type="text" class="input-text" name="primerApellido" autofocus="autofocus" value="<?php echo $datos['primerApellido']?>">
									                						
							  			</p>
										        <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
										            <label for="billing_last_name" class="">Segundo Apellido:</label>
										            <input type="text" class="input-text" name="segundoApellido" autofocus="autofocus" value="<?php echo $datos['segundoApellido']?>">
										         </p>
										          <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
									                <label for="billing_first_name" class="">Documento identidad: <abbr class="required" title="required">*</abbr>
									                </label>
									                <input type="text" class="input-text" name="documentoIdentidad" autofocus="autofocus" value="<?php echo $datos['documentoIdentidad']?>">
									                						
							  			        </p>
										        <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
										            <label for="billing_last_name" class="">Fecha Nacimiento:</label>
										            <input type="date" class="input-text" name="fechaNacimiento" autofocus="autofocus" value="<?php echo $datos['fechaNacimiento']?>">
										            
										         </p> 
										         <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
									                <label for="billing_email" class="">Correo Electrónico:
									                </label>
									                <input type="email" class="input-text"  name="correo" autofocus="autofocus" value="<?php echo $datos['correo']?>" >
							            		</p>
									            <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
									                <label for="billing_phone" class="">Número de contácto<abbr class="required" title="required">*</abbr>
									                </label>
									                <input type="text" class="input-text"  name="numeroContacto"  autofocus="autofocus"  value="<?php echo $datos['numeroContacto']?>">
									                
							           			 </p>
							           			 <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
										                <label for="billing_company" class="">Dirección:<abbr class="required" title="required">*</abbr></label>
										                <input type="text" class="input-text " name="direccion" autocomplete="organization" value="<?php echo $datos['direccion']?>">
										        </p>
										        <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
										        	<label for="billing_first_name" class="">Sexo:<abbr class="required" title="required">*</abbr></label>
										        	<ul>
						                         		<li>
								                           <div class="col-md-8">
								                            	<input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? 'checked':'' ?> required>Masculino			                                
								                            </div>		                           
							                           		 <div class="col-md-8">
							                            		<input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>>Femenino		                                
							                           		 </div>
							                            	
							                            </li>
						                            </ul>
										        	
										        </p>

										        <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
									                <label for="billing_country" class="">Estado:
									                </label>
									                <select name="estado" style="width: 30%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
									                    <option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?> >Activo
									                    </option>
										   				<option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?> >Inactivo
										   				</option>
									                </select>
						            			</p>
						            			<input value="SIGUIENTE" class="btn btn-lg btn-brown" type="submit">
						            							   										                   					
						                    </div>
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