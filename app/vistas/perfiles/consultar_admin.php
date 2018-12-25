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
			<form class="checkout woocommerce-checkout" enctype="multipart/form-data"  action="<?php echo RUTA_URL;?>/Perfiles/actualizar_admin/<?php echo $datos['idPersona']?>" method="POST">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div id="customer_details">
							    <div class="woocommerce-billing-fields">
							        <div class="woocommerce-billing-fields__field-wrapper">
							        	<p>
                   							 <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>              
                 						 </p> 
							        	<p class="form-row form-row-wide" data-priority="30">
							                <label for="billing_company" class="">Nombre completo</label>
							                <input style="background-color:#F5F5F5;" class="input-text " name="nombreCompleto" type="text" disabled value="<?php echo $datos['primerNombre'].' '.$datos['segundoNombre'].' '.$datos['primerApellido'].' '.$datos['segundoApellido']?>"  />
							            </p> 
							            <p class="form-row form-row-first">
							                <label for="billing_first_name" class="">Documento de identidad</label>
							                <input style="background-color:#F5F5F5;" class="input-text" name="documentoIdentidad" type="text" disabled value="<?php echo $datos['documentoIdentidad']?>"  />
							            </p>
							            <p class="form-row form-row-last" data-priority="20">
							                <label for="billing_last_name" >Fecha Nacimiento</label>
							                <input style="background-color:#F5F5F5;" class="input-text" name="fechaNacimiento" type="text"  disabled value="<?php echo $datos['fechaNacimiento']?>" />
							            </p>
							           		<p class="form-row form-row-first validate-required validate-phone" data-priority="100">
							                <label for="billing_phone" class="">Correo<abbr class="required" title="required">*</abbr></label>
							                <input class="input-text " required  name="correo" id="correo" type="email" value="<?php echo $datos['correo']?>"  />
							            </p>
							            <p class="form-row form-row-last validate-required validate-email" data-priority="110">
							                <label for="billing_email" class="">Número de contácto<abbr class="required" title="required">*</abbr></label>
							                <input class="input-text " required name="numeroContacto" type="text" onkeypress="return SoloNumeros(event);" id="numeroContacto"  maxlength="15" onBlur="validarLenght(this.value);"  value="<?php echo $datos['numeroContacto']?>" />
							            </p>
							            <p class="form-row form-row-wide address-field update_totals_on_change validate-required" data-priority="40">
							                <label for="billing_country" class="">Dirección<abbr class="required" title="required">*</abbr>
							                </label>
							                 <input class="input-text" required name="direccion" type="text" value="<?php echo $datos['direccion']?>" >
							            </p>

							            <!--presguntar si desea combiar contrasena--> 
					                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" data-priority="40">
					                      <label for="billing_country" class="">Desea Cambiar la contrasena:
					                      </label>
					                        <select style="width: 30%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country"  NAME="contrasenaSiNo" onChange="MostrarSiNoContrasena(this)" > 
					                          <option value="opc2">No</option>
					                          <option value="opc1">Si</option>
					                          
					                          
					                        </select>
					                    </p>
					                    <div id="mostrar" style="display:none;">
								             <!--Asignar contrasena--> 
						                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" data-priority="10">
						                      <label for="billing_first_name" class="">Contrasena: <abbr title="required">*</abbr></label>
						                      <input type="password" class="input-text"  name="contrasena" autofocus="autofocus" value="" id="contrasena" >
						                                   
						                    </p>
						                    <!--Confirmar ontrasena--> 
						                    <p class="form-row form-row-last validate-required woocommerce-validated"  data-priority="20">
						                      <label for="billing_last_name" class="">Confirmar contrasena:</label>
						                      <input type="password" class="input-text" name="confi_Contrasena" id="confi_Contrasena" autofocus="autofocus" value="">                                
						                    </p>
					                    </div>
					                    <div id="noMostrar" style="display:;">
								             <!--contrasena--> 						             
						                      <input hidden  type="password" class="input-text" disabled  name="contrasena" autofocus="autofocus" id="contrasena"  value="">              
						                    </p>
						 
					                    </div>
							        </div>
							    </div>
							   
							</div>	
						</div>
						<div class="col-md-6 perfil-cont">
							<div class="content-img-Perfil">
								<p >Foto de perfil</p>
								<div class="div-img-perfil" >
									<img  src="<?php echo RUTA_URL.'/images/perfiles/usuario'.$datos['idPersona'].'.jpg'?>" width="170">
								</div>
								<div class="div-input-file">
										<input type="file" name="foto" >
									</div>

							</div>	
						</div>
					</div>
					<div  class="col-md-12" >
					<a href="<?php echo RUTA_URL;?>/paginas/index" class="btn btn-lg btn-bordered">Cancelar</a>
					<input value="actualizar" class="btn btn-lg btn-brown" type="submit"/>
				</div>
				</div>
			</form>
		</div>
</section>
<!-- CART END --> 


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 