<?php require RUTA_APP . '/vistas/inc/header.php' ?>
	
	<?php if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
	?>

<!-- CART --> 
	<section class="cart-wrap">
		<div class="col-md-6" align="right">
		 <a  href="<?php echo RUTA_URL;?>/paginas/index" class="btn btn-light"><i class="fa fa-backward"></i> Salir</a>
		 </div>
		<div class="col-md-12">
		<h2>Datos personales</h2>
		</div>

		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" enctype="multipart/form-data"  action="<?php echo RUTA_URL;?>/Perfiles/actualizar/<?php echo $datos['idPersona']?>" method="POST">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div id="customer_details">
							    <div class="woocommerce-billing-fields">
							        <div class="woocommerce-billing-fields__field-wrapper">
							        	<p>
                   							 <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>              
                 						 </p> 
							        	<p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
							                <label for="billing_company" class="">Nombre completo</label>
							                <input style="background-color:#dddddd;" class="input-text " name="nombreCompleto" type="text" disabled value="<?php echo $datos['primerNombre'].' '.$datos['segundoNombre'].' '.$datos['primerApellido'].' '.$datos['segundoApellido']?>"  />
							            </p> 
							            <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
							                <label for="billing_first_name" class="">Documento de identidad</label>
							                <input style="background-color:#dddddd;" class="input-text" name="documentoIdentidad" id="" type="text" disabled value="<?php echo $datos['documentoIdentidad']?>"  />
							            </p>
							            <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
							                <label for="billing_last_name" >Fecha Nacimiento</label>
							                <input style="background-color:#dddddd;" class="input-text" name="fechaNacimiento" type="text"  disabled value="<?php echo $datos['fechaNacimiento']?>" />
							            </p>
							           		<p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
							                <label for="billing_phone" class="">Correo<abbr class="required" title="required">*</abbr></label>
							                <input class="input-text " required  name="correo" id="correo" type="email" value="<?php echo $datos['correo']?>"  />
							            </p>
							            <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
							                <label for="billing_email" class="">Número de contácto<abbr class="required" title="required">*</abbr></label>
							                <input class="input-text " required name="numeroContacto" id="" type="text" value="<?php echo $datos['numeroContacto']?>" />
							            </p>
							            <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
							                <label for="billing_country" class="">Dirección<abbr class="required" title="required">*</abbr>
							                </label>
							                 <input class="input-text" required name="direccion" id="" type="text" value="<?php echo $datos['direccion']?>" >
							            </p>

							        </div>
							    </div>
							   
							</div>	
						</div>
						<div class="col-md-6">
							<div class="order_box">
								<h6>foto de perfil</h6>	
							    <div id="order_review" class="woocommerce-checkout-review-order">					        
							        <div id="payment" class="woocommerce-checkout-payment">
							        	<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
							                <label for="billing_country" class="">Foto</label>
							            </p>
							            <div class="col-md-3 col-sm-6">
											<p><img src="<?php echo RUTA_URL.'/images/perfiles/usuario'.$datos['idPersona'].'.jpg'?>"  height="100" width="100"></p>
										</div>
										<input type="file" name="foto">							            
							            
							        </div>
							    </div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="form-row place-order" align="center">
					<input value="actualizar" class="btn btn-lg btn-brown" type="submit"/>
				</div>
			</form>
		</div>
	</section>
<!-- CART END --> 


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 