<?php require RUTA_APP . '/vistas/inc/header.php' ?>


<!--!-->
<div class="">
	<h3>Finca</h3>
	<h2>Registrar información de la finca</h2>
	<!-- REGISTRAR INFORMACIÓN DE LA FINCA!-->
	

	<form action="<?php echo RUTA_URL;?>/Fincas/agregar" method="POST">

	 <table class="shop_table shop_table_responsive cart">
					                <thead>
					                    <tr>
					                        
					                    	<th class="product-remove">Nombre</th>
											<th class="product-remove">Temperatura</th>
											<th class="product-remove">Coordenadas Google</th>
											<th class="product-remove">Departamento</th>
											<th class="product-remove">Municipio</th>
											<th class="product-remove">Vereda</th>
											<th class="product-remove">Estado</th>
											<th class="product-remove">Acciones</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
									<?php if (isset($datos['fincas'])) { foreach($datos['fincas'] as $finca): ?>
										<tr class="cart_item">
											<td class="product-remove">					
												<?php echo $finca->nombreFinca;?>								
											</td>
										
											<td class="product-remove">
													<?php echo $finca->Temperatura;?>
											</td class="cart_item">
										
											<td class="product-remove">
												<?php echo $finca->coordenadasGoogle;?>
											</td>
											<td class="product-remove">
												<?php echo $finca->departamento;?>				
											</td>
											<td class="product-remove">
												<?php echo $finca->municipio;?>				
											</td>
											<td class="product-remove">
												<?php echo $finca->vereda;?>				
											</td>
											<td class="product-remove">
												<?php echo $finca->Estado;?>				
											</td class="product-remove">
											<td class="product-remove">

												<!--esto me esta redireccionando al metodo fincas/agregar y le pasa el id de la finca (parametro $idFinca del metodo)-->
												<a href="<?php echo RUTA_URL;?>/Fincas/agregar/<?php echo $finca->idDetalleFinca;?>">
													Editar
												</a>		
											</td>

										</tr>
									<?php endforeach; }?>
					                </tbody>
					            </table>


		<div class="form-group">

			<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >

			<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
			<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >


			<p>
				<label for="nombreFinca">Nombre:<sub>*</sub>
					<input type="text" class="" name="nombreFinca" required value="<?php echo isset($datos['nombreFinca'])? $datos['nombreFinca'] : '';?>">
				</label>

				<label for="Temperatura">Temperatura:
					<input type="text" class="" name="Temperatura" value="<?php echo isset($datos['Temperatura'])? $datos['Temperatura'] : '';?>">
				</label>
			</p> 
			<p>
				<label form="coordenadasGogle">Coordenadas Gogle
					<input type="text" class="" name="coordenadasGoogle" value="<?php echo isset($datos['coordenadasGoogle'])? $datos['coordenadasGoogle'] : '';?>" >
				</label>
			</p>
			<p>
				<label for="departamento">Departamento
					<select id="departamento" name="departamento" value="">
        			</select>	 				
		 		</label>
	 		</p>
	 		<p>
	 			<label for="municipio">Municipio
	      		  	<select id="municipio" name="municipio">
	        		</select>
	        	</label>
    		</p>
	 		<p>
	 		 	<label for="vereda">Vereda:
					<input type="text" class="" name="vereda" value="<?php echo isset($datos['vereda'])? $datos['vereda'] : '';?>">
				</label>
	 		 </p>
	 		 <label for="Estado">Estado
					<select name="Estado">
						<option value="0">--Seleccione--</option>
	   					<option value="Habilitado" <?php (isset($datos['Estado']) && $datos['Estado'] =='Habilitado')? print "selected='selected'" : print "";?>>Habilitado</option>
	   					<option value="Inhabilitado" <?php (isset($datos['Estado']) && $datos['Estado'] =='Inhabilitado')? print "selected='selected'" : print "";?>>Desabilitado</option>		  				
	 				</select>
	 		</label>
	 		<!--Dependiendo de si esta editando o no muestro el boton guardar o agregar para que el usuario sepa si esta editando o agregando uno nuevo-->
	 		<input class="" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>">
		</div>		
	</form>
</div>

	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 