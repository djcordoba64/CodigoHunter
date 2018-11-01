<?php require RUTA_APP . '/vistas/inc/header.php' ?>


<section class="cart-wrap">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="">
	                <form class="form-horizontal" method="post">
	                    <fieldset>
	                       <div class="col-md-12">
								<h2>Información personal</h2>
							</div>
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
	                            <div class="col-md-8">
	                                <input type="text" class="form-control" name="primerNombre" placeholder="Primer Nombre" required value="<?php echo $datos['primerNombre']?>">
	                            </div>
	                         </div>   
                      
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
	                            <div class="col-md-8">
	                            	<input type="text" class="form-control" name="segundoNombre" placeholder="Segundo Nombre" value="<?php echo $datos['segundoNombre']?>">
	                               
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user-o"></i></span>
	                            <div class="col-md-8">
	                            	<input type="text" class="form-control" name="primerApellido" placeholder="Primer apellido" value="<?php echo $datos['primerApellido']?>">
	                               
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user-o"></i></span>
	                            <div class="col-md-8">
	                            	<input type="text" class="form-control" name="segundoApellido" placeholder="Segundo apellido" value="<?php echo $datos['segundoApellido']?>">
	                               
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-address-book"></i></span>
	                            <div class="col-md-8">
	                            	<input type="text" class="form-control" name="documentoIdentidad" placeholder="Documento" value="<?php echo $datos['documentoIdentidad']?>">
	                               
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar"></i></span>
	                            <div class="col-md-8">
	                            	<input type="date" class="form-control" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?php echo $datos['fechaNacimiento']?>">
	                               
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
	                            <div class="col-md-8">
	                                <input type="email" class="form-control"  name="correo" placeholder="Coreo electrónico" value="<?php echo $datos['correo']?>" >
	                            </div>
	                        </div>


	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
	                            <div class="col-md-8">
	                                <input type="`text" class="form-control" name="numeroContacto" placeholder="Número de contácto" required value="<?php echo $datos['numeroContacto']?>">
	                            </div>
	                        </div>
	                         <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-map-marker"></i></span>
	                            <div class="col-md-8">
	                                <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?php echo $datos['direccion']?>">
	                            </div>
	                        </div>
	                         <div class="form-group">
	                         	<ul>
	                         		<li>
		                         		<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-male"></i></span>
			                            <div class="col-md-8">
			                            	<input type="radio" name="sexo" value="Masculino" <?php echo  $datos['sexo'] == 'Masculino' ? 'checked':'' ?> required>Masculino			                                
			                            </div>		                           
		                             	<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-female"></i></span>
		                           		 <div class="col-md-8">
		                            		<input type="radio" name="sexo" value="Femenino" <?php echo $datos['sexo'] =='Femenino' ? 'checked':'' ?>>Femenino		                                
		                           		 </div>
		                            	
		                            </li>
	                            </ul>
	                        </div>
	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-chevron-down"></i></span>
	                            <div class="col-md-8">
	                            	<select name="estado" required aria-required="true">
					   					<option value="Activo" <?php echo $datos['estado']=='Activo'? print "selected='selected'" : "";?>>Activo</option>
					   					<option value="Inactivo" <?php echo $datos['estado']=='Inactivo'? print "selected='selected'" : "";?>>Inactivo</option>
				 					 </select>	                                
	                            </div>
	                        </div>


	                        <div class="form-group">
	                            <div class="col-md-12 text-center">
	                            	<input type="submit"  class="btn btn-primary'" value="Siguiente" >
	                            
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</section>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 