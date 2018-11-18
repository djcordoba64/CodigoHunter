<?php require RUTA_APP . '/vistas/inc/header.php' ?>
 <section class="cart-wrap">
  <a href="<?php echo RUTA_URL;?>/Cliente/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  	<div class="col-md-12">
		<h2>Infomación personal del Cliente</h2>
	</div>
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $datos['idPersona']?>" method="POST">
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
					                      <input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required value="<?php echo $datos['primerNombre']?>">              
					                    </p>
					                    <!--Segundo Nombre--> 
					                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
					                      <label for="billing_last_name" class="">Segundo nombre:</label>
					                      <input type="text" class="input-text" name="segundoNombre" autofocus="autofocus" value="<?php echo $datos['segundoNombre']?>">                               
					                    </p>
					                    <!--Primer Apellido--> 
					                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
					                      <label for="billing_first_name" class="">Primer Apellido: <abbr class="required" title="required">*</abbr>
					                      </label>
					                      <input type="text" class="input-text" name="primerApellido" autofocus="autofocus" value="<?php echo $datos['primerApellido']?>">
					                    </p>
					                    <!--Segundo Apelido--> 
					                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
					                       <label for="billing_last_name" class="">Segundo Apellido:</label>
					                        <input type="text" class="input-text" name="segundoApellido" autofocus="autofocus" value="<?php echo $datos['segundoApellido']?>">
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
					                      <input type="text" class="input-text"  name="numeroContacto"  autofocus="autofocus"  value="<?php echo $datos['numeroContacto']?>">
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
					                              <input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? '':'checked' ?> required>Masculino                                      
					                            </div>                               
					                            <div class="col-md-8">
					                            <input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>>Femenino                                    
					                            </div>                                           
					                          </li>
					                        </ul>
					                    </p>
					                                   
					                    <!--Estado--> 
					                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
					                      <label for="billing_country" class="">Estado:</label>
					                        <select name="estado" style="width: 30%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
					                          <option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?> >Activo</option>
					                          <option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?> >Inactivo</option>
					                        </select>
					                    </p>
									</div>
			         			 	<input value="Actualizar" class="btn btn-brown" type="submit">
			         			 	<a href="<?php echo RUTA_URL;?>/Cliente/index"" class="btn btn-default">Cerrrar</a>
			     

			                  </div>
							</div>
						</div>
					
				</div>
				<div class="col-md-6">
						<label>Fincas del cliente</label>
						<table class="shop_table shop_table_responsive cart" width="800">
					        <thead>
					            <tr>					                        
					                <th class="product-remove">Nombre</th>									
									<th class="product-remove">Municipio</th>
									<th class="product-remove">Vereda</th>
									<th class="product-remove">Estado</th>
									<th class="product-remove">Acciones</th>
					            </tr>
					        </thead>
					        <tbody  class="cart_item">					             
								<?php if (isset($datos['fincas'])) { foreach($datos['fincas'] as $finca): ?>
									<tr class="cart_item">
										<td class="product-remove"><?php echo $finca->nombreFinca;?></td>
										<td class="product-remove"><?php echo $finca->municipio;?></td>
										<td class="product-remove"><?php echo $finca->vereda;?></td>
										<td class="product-remove"><?php echo $finca->Estado;?></td>
										<td class="product-remove">

										<a  href="<?php echo RUTA_URL;?>/Fincas/editar_finca_index/<?php echo $finca->idDetalleFinca;?>" class="btn btn-sm btn-default" target="_blank">
                       							<span class="glyphicon glyphicon-edit"></span> Editar
                      					</a>           
										
										</td>
									</tr>
								<?php endforeach; }?>
					        </tbody>
					    </table>
					</div>
			</form>
		</div>
	</div>
 </section>



	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 