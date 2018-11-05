<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
	<div class="row">
  		<section>
          <div class="wizard">
            <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
            </div>
            <form role="form">
              <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="step1">
                  	<!--FORMULARIO PARA REGISTRAR LOS DATOS PERSONALES DEL CLIENTE-->
                  	<form action="<?php echo RUTA_URL;?>/Cliente/crear" method="POST">
                  		<div class="woocommerce-tabs wc-tabs-wrapper">
							<h2>Datos Personales</h2>		
						</div >
                  		<span><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
                  		<div class="contentform">
 						   	<div class="leftcontact"> 						   		
 						   		<!--PRIMER NOMBRE-->
 						   		<div class="form-group">
						            <p>Primer Nombre<span>*</span></p>
						            <span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required value="<?php echo $datos['primerNombre']?>">	
					                <div class="validation"></div>
								</div>
								<!--PRIMER APELLIDO-->
								<div class="form-group">
						            <p>Primer apellido<span>*</span></p>
						            <span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="text" class="input-text" name="primerApellido" autofocus="autofocus" value="<?php echo $datos['primerApellido']?>">
					                <div class="validation"></div>
								</div>
								<!--DOCUMENTO IDENTIDAD-->
								<div class="form-group">
						            <p>Documento de identidad<span>*</span></p>
						            <span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="text" class="input-text" name="documentoIdentidad" autofocus="autofocus" value="<?php echo $datos['documentoIdentidad']?>">
					                <div class="validation"></div>
								</div>           					
								<!--CORREO-->
								<div class="form-group">
								<p>Correo <span>*</span></p>	
									<span class="icon-case"><i class="fa fa-envelope-o"></i></span>
						                <input type="email" class="input-text"  name="correo" autofocus="autofocus" value="<?php echo $datos['correo']?>" >
						             <div class="validation"></div>
								</div>	
								<!--DIRECCIÓN-->
								<div class="form-group">
									<p>Direción<span>*</span></p>
									<span class="icon-case"><i class="glyphicon glyphicon-home"></i></span>
										<input type="text" class="input-text " name="direccion" autocomplete="organization" value="<?php echo $datos['direccion']?>">
						                <div class="validation"></div>
								</div>
								<!--ESTADO-->
								<div class="form-group">
									<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40">
									    <label for="billing_country" class="">Estado:</label>
									    <select name="estado" style="width: 30%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
									        <option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?> >Activo
									        </option>
										   	<option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?> >Inactivo
										   	</option>
										</select>
									</p>						           	
						        </div>
							</div>										
							<div class="rightcontact">
								<!--SEGUNDO NOMBRE-->
								<div class="form-group">
						            <p>Segundo Nombre<span>*</span></p>
						            <span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="text" class="input-text" name="segundoNombre" autofocus="autofocus" value="<?php echo $datos['segundoNombre']?>">
					                <div class="validation"></div>
								</div>
								<!--SEGUNDO APELLIDO-->
								<div class="form-group">
						            <p>Segundo Apellido<span>*</span></p>
						            <span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="text" class="input-text" name="segundoApellido" autofocus="autofocus" value="<?php echo $datos['segundoApellido']?>">
					                <div class="validation"></div>
								</div>
								<!--FECHA DE NACIMIENTO-->
								<div class="form-group">
						            <p>Fecha de nacimiento<span>*</span></p>
						            <span class="icon-case"><i class="glyphicon glyphicon-calendar"></i></span>
									<input type="date" class="input-text" name="fechaNacimiento" autofocus="autofocus" value="<?php echo $datos['fechaNacimiento']?>">
					                <div class="validation"></div>
								</div>
								<!--NÚMERO DE CONTÁCTO-->
								<div class="form-group">
								<p>Número de contácto<span>*</span></p>	
								<span class="icon-case"><i class="fa fa-phone"></i></span>
									<input type="text" class="input-text"  name="numeroContacto"  autofocus="autofocus"  value="<?php echo $datos['numeroContacto']?>">
					                <div class="validation"></div>
								</div>
								<!--SEXO-->
								<div class="form-group">
									<p>Sexo <span>*</span></p>
									<ul>
						                <li>
								            <div class="col-md-4">
								             	<input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? 'checked':'' ?> required>Masculino
								             </div>		                           
							                <div class="col-md-8">
							                    <input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>>Femenino		                                
							                    </div>
							            </li>
						            </ul>
									
								</div>
							</div>
						</div>
						<div class="form-groupBTN" >
							<input value="SIGUIENTE" class="btn btn-lg btn-brown" type="submit">
						</div>
				    </form>            		
				 </div>					                  
                  <div class="tab-pane" role="tabpanel" id="step2">
                    <h3>Datos de la finca</h3>
                    
                  </div>
                  <div class="tab-pane" role="tabpanel" id="complete">
                    <h3>Complete</h3>                                                      
                  </div>
                  <div class="clearfix">
                 </div>
              </div>
            </form>
          </div>
    </section>
   </div>
</div>


<!-- CART END --> 
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 