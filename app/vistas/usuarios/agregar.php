<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php require RUTA_APP . '/vistas/inc/header.php' ?>

  <!-- PAGE HEAD -->
    <section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?php echo RUTA_URL;?>/paginas">Inicio</a></li>
              <li>Usuarios</li>
            </ul>
            <h1>Nuevo</h1> 
          </div>
        </div>
      </div>
    </section>
  <!-- PAGE HEAD END -->
  <!--Formulario de registro-->
  <section class="cart-wrap">
  	<div class="col-md-12">
		<h2>Infomación personal del usuario</h2>
	</div>
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Usuarios/agregar" method="POST">
				<div class="row">
					<div class="col-md-6">
						<div id="customer_details">
							<div class="woocommerce-billing-fields">
								<div class="woocommerce-billing-fields">
                  <p>
                    <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>              
                  </p>                                    
                  <div class="woocommerce-billing-fields__field-wrapper">
                    <!--Primer Nombre--> 
                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                      <label for="billing_first_name" class="">Primer Nombre: <abbr class="required" title="required">*</abbr></label>
                      <input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required value="<?php echo $datos['primerNombre']?>" onkeypress="return soloLetras(event);" id="primerNombre">              
                    </p>
                    <!--Segundo Nombre--> 
                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                      <label for="billing_last_name" class="">Segundo nombre:</label>
                      <input type="text" class="input-text" name="segundoNombre" autofocus="autofocus" value="<?php echo $datos['segundoNombre']?>" onkeypress="return soloLetras(event);" id="segundoNombre">                               
                    </p>
                    <!--Primer Apellido--> 
                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                      <label for="billing_first_name" class="">Primer Apellido: <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" name="primerApellido" autofocus="autofocus" value="<?php echo $datos['primerApellido']?>" onkeypress="return soloLetras(event);" id="primerApellido" >
                    </p>
                    <!--Segundo Apelido--> 
                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                       <label for="billing_last_name" class="">Segundo Apellido:</label>
                        <input type="text" class="input-text" name="segundoApellido" autofocus="autofocus" value="<?php echo $datos['segundoApellido']?>" onkeypress="return soloLetras(event);" id="segundoApellido">
                    </p>
                    <!--Documento de Identidad-->  
                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                      <label for="billing_first_name" class="">Documento identidad: <abbr class="required" title="required">*</abbr></label>
                      <input type="text" class="input-text" name="documentoIdentidad" autofocus="autofocus" value="<?php echo $datos['documentoIdentidad']?>">
                    </p>
                    <!--Fecha de nacimiento--> 
                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                      <label for="billing_last_name" class="">Fecha Nacimiento:</label>
                        <input type="date" class="input-text" name="fechaNacimiento" autofocus="autofocus" value="<?php echo $datos['fechaNacimiento']?>">
                    </p>
                    <!--Correo Electónico-->  
                    <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                        <label for="billing_email" class="">Correo Electrónico:</label>
                          <input type="email" class="input-text"  name="correo" autofocus="autofocus" value="<?php echo $datos['correo']?>" >
                    </p>
                    <!--Número de contáçto--> 
                    <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                      <label for="billing_phone" class="">Número de contácto<abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text"  name="numeroContacto"  autofocus="autofocus"  value="<?php echo $datos['numeroContacto']?>" onkeypress="return SoloNumeros(event);" id="numeroContacto"  maxlength="15" onBlur="validarLenght(this.value);">
                    </p>
                    <!--Dirección--> 
                    <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                        <label for="billing_company" class="">Dirección:<abbr class="required" title="required">*</abbr></label>
                        <input type="text" class="input-text " name="direccion" autocomplete="organization" value="<?php echo $datos['direccion']?>">
                    </p>
                    <!--sexo--> 
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
                    <!--Asignar contrasena--> 
                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                      <label for="billing_first_name" class="">Asignar contrasena: <abbr class="required" title="required">*</abbr></label>
                      <input type="password" class="input-text"  name="contrasena" autofocus="autofocus" required value="<?php echo $datos['contrasena']?>">              
                    </p>
                    <!--Confirmar ontrasena--> 
                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                      <label for="billing_last_name" class="">Confirmar contrasena:</label>
                      <input type="password" class="input-text" name="confi_Contrasena" autofocus="autofocus" value="<?php echo $datos['confi_Contrasena']?>">                                
                    </p>
                    <!--Rol--> 
                    <p  class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                      <label for="billing_country" class="">Rol:</label>
                        <select name="rol" style="width: 90%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
                          <option value="">Seleccione..</option>
                          <option value="administrador" <?php  $datos['rol']=='administrador'? print "selected='selected'" : "";?> >Administrador</option>
                          <option value="coordinador" <?php $datos['rol']=='coordinador'? print "selected='selected'" : "";?> >Coordinador</option>
                          <option value="operario" <?php $datos['rol']=='operario'? print "selected='selected'" : "";?> >Operario</option>
                          <option value="tostador" <?php $datos['rol']=='tostador'? print "selected='selected'" : "";?> >Tostador</option>
                        </select>
                    </p>

                    <!--Estado--> 
                    <p  class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
                      <label for="billing_country" class="">Estado:</label>
                        <select name="estado" style="width: 90%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
                          <option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?> >Activo</option>
                          <option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?> >Inactivo</option>
                        </select>
                    </p>
                      
                                                                                        
                    </div>                   
                  </div>
							</div>
						</div>
           
            <a href="<?php echo RUTA_URL;?>/Usuarios/index" class="btn btn-lg btn-bordered">Cancelar</a>
             <input value="Guardar" class="btn btn-lg btn-brown" type="submit"> 
					</div>
				</div>
			</form>
		</div>
	</div>
  </section>

  

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 