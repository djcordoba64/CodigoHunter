<?php require RUTA_APP . '/vistas/inc/header.php' ?>
 <section class="cart-wrap">
  <a href="<?php echo RUTA_URL;?>/Cliente/index" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
  	<div class="col-md-12">
		<h2>Infomación del Cliente</h2>
	</div>
	<div class="container">
		<div class="woocommerce">
			<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Cliente/editar/<?php echo $datos['idPersona']?>" method="POST">
				<div class="row">
					<div class="col-md-6">
						<h4>Datos a editar</h4>
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
					                      <input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required  value="<?php echo $datos['primerNombre']?>"  onkeypress="return soloLetras(event);" id="primerNombre">

					                                  
					                    </p>
					                    <!--Segundo Nombre--> 
					                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
					                      <label for="billing_last_name" class="">Segundo nombre:</label>
					                      <input type="text" class="input-text" name="segundoNombre" autofocus="autofocus" value="<?php echo $datos['segundoNombre']?>"   onkeypress="return soloLetras(event);" id="segundoNombre">                               
					                    </p>
					                    <!--Primer Apellido--> 
					                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
					                      <label for="billing_first_name" class="">Primer Apellido: <abbr class="required" title="required">*</abbr>
					                      </label>
					                      <input type="text" class="input-text" name="primerApellido" autofocus="autofocus" required value="<?php echo $datos['primerApellido']?>"  onkeypress="return soloLetras(event);" id="primerApellido">
					                    </p>
					                    <!--Segundo Apelido--> 
					                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
					                       <label for="billing_last_name" class="">Segundo Apellido:</label>
					                        <input type="text" class="input-text" name="segundoApellido" autofocus="autofocus" value="<?php echo $datos['segundoApellido']?>"  onkeypress="return soloLetras(event);" id="segundoApellido">
					                    </p>
					                    <!--Documento de Identidad-->  
					                    <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
					                      <label for="billing_first_name" class="">Documento identidad: <abbr class="required" title="required">*</abbr></label>

					                      <input type="text" class="input-text" name="documentoIdentidad" autofocus="autofocus" required value="<?php echo $datos['documentoIdentidad']?>" >
					                    </p>
					                    <!--Fecha de nacimiento--> 
					                    <p class="form-row form-row-last validate-required woocommerce-validated" id="billing_last_name_field" data-priority="20">
					                      <label for="billing_last_name" class="">Fecha Nacimiento:</label>
					                        <input type="date" class="input-text" name="fechaNacimiento" autofocus="autofocus"  value="<?php echo $datos['fechaNacimiento']?>">
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
					                      <input type="text"  class="input-text"  name="numeroContacto"  autofocus="autofocus"  value="<?php echo $datos['numeroContacto']?>"  onkeypress="return SoloNumeros(event);" id="numeroContacto"  maxlength="15" onBlur="validarLenght(this.value);">
					                    </p>
					                    <!--Dirección--> 
					                    <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
					                        <label for="billing_company" class="">Dirección:<abbr class="required" title="required">*</abbr></label>
					                        <input type="text" class="input-text " name="direccion" autocomplete="organization" required value="<?php echo $datos['direccion']?>">
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
					                                   
					                    <!--Estado--> 
					                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
					                      <label for="billing_country" class="">Estado:</label>
					                        <select name="estado" style="width: 30%" class="country_to_state country_select select2-hidden-accessible" required autocomplete="country">
					                          <option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?> >Activo</option>
					                          <option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?> >Inactivo</option>
					                        </select>
					                    </p>
									</div>			         			 				         			 	
			         			 	<a href="<?php echo RUTA_URL;?>/Cliente/index" class="btn btn-bordered" />Cerrrar</a>
			         			 	<button onclick="exito();"  class="btn btn-brown">Actualizar</button>
			         			 </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 text-page" style="padding:70px;">
							<div class="col-md-12" align="center">
								<h4>Fincas del cliente</h4>
							</div>
							
							<table class="table table-bordered" >
						        <thead>
						            <tr>					                        
						                <th  style="font-size:12px;text-align: center">Nombre</th>									
										<th style="font-size:12px;text-align: center">Municipio</th>
										<th style="font-size:12px;text-align: center">Vereda</th>
										<th style="font-size:12px;text-align: center">Estado</th>
										<th style="font-size:12px;text-align: center">Acciones</th>
						            </tr>
						        </thead>
						        <tbody  class="cart_item">					             
									<?php if (isset($datos['finca'])) { foreach($datos['finca'] as $finca): ?>
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
						    <p>*De clic en la siguiente opción para agregar una finca</p>
						    <div class="col-sm-12">
								<div class="footer-social" >
									<div class="title" ></div>
									<ul class="social">												
										<li>
											<a href="<?php echo RUTA_URL;?>/Fincas/agregar_finca_mostrar_formulario/<?php echo $datos['idPersona'];?>" data-toggle="tooltip" title="Agregar una finca!" target="_blank">
											<i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>
										</li>
									</ul>	
								</div>
							</div>
					</div>
				</div>
			</form>
		</div>
	</div>
 </section>



	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 