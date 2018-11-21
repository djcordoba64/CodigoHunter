<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">
				<!--FORMULAIO DEL CAFÉ-->	

				<form id="form1" method="POST">													
				<div class="contact-form">
					<div class="row" style="background-color:#fff" >
						<!--en el input hidden tare el id del cliente-->
						<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >
							<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
						<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >
						<!--en el input hidden tare el id del cliente-->
						<input type="hidden" name="correo" value="<?php echo $datos["correo"] ?>" >
						<!--en el input hidden tare el id del cliente-->
						<input type="hidden" name="direccion" value="<?php echo $datos["direccion"] ?>" >
						<!--en el input hidden tare el id del cliente-->
						<input type="hidden" name="Temperatura" value="<?php echo $datos["Temperatura"] ?>" >
						<!--hidden para guardar temporalmente los lotes de cafe que se van creando y poder guardarlas todas al final junto con el cliente y la finca-->	
						<input type="hidden" name="lotesJson" value='<?php echo isset($datos['lotesJson'])? $datos['lotesJson'] : '';?>'><!--array de lotes de cafe en una cadena de json-->
						<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
						<input type="hidden" name="idLoteCafe" value="<?php echo isset($datos['idLoteCafe'])? $datos['idLoteCafe'] : '-1';?>" >
						<!--datos del café lado izquierdo-->														
						<div class="col-md-6">
							<h4>Datos del café</h4>
							<div class="col-md-12" >
								<!--<label for="" class="">Codigo</label>
								<input type="text" name="codigoCafe" disabled >	-->					
							</div>
							<div class="col-md-12">
								<label for="" class="">Foto</label>
								<input type="file" name="archivo" /><br />				
							</div>

							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Peso</label>
										<input class="contact-input" type="number" name="peso" value="<?php echo isset($datos['peso'])? $datos['peso'] : '';?>" required>
									</p>
								</div>
								<div  class="col-md-6">
									<label for="" class="">Variedad</label>
										<input class="contact-input" type="text"  name="variedad" value="<?php echo isset($datos['variedad'])? $datos['variedad'] : '';?>" required>											
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Tipo de tueste</label>
										<input class="contact-input" type="text"  name="tipoTueste" value="<?php echo isset($datos['tipoTueste'])? $datos['tipoTueste'] : '';?>"  required>
									</p>
								</div>
								<div  class="col-md-6">
									<label>Materia prima:</label>
									<select name="materia" id="materia" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" required>
										   	<option value="">Seleccione..
										    </option>
										</select>																				
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<label>Tipo de beneficio:</label>
									<select name="beneficio" id="beneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country"  required>
										   	<option value="">Seleccione..
										    </option>
										</select>
								</div>
								<div  class="col-md-6">
									<p>
										<label for="" class="">Porcentaje de humedad</label>
										<input class="contact-input" type="number" name="PorcentajeHumedad" value="<?php echo isset($datos['PorcentajeHumedad'])? $datos['PorcentajeHumedad'] : '';?>" required>
									</p>																				
								</div>
								<div class="col-md-6">
									<p>
										<label for="" class="">Factor de rendimiento</label>
										<input class="contact-input" type="number" name="factorRendimiento" value="<?php echo isset($datos['factorRendimiento'])? $datos['factorRendimiento'] : '';?>"  required>
									</p>
								</div>
								<div class="col-md-6">
									<p>
										<label for="billing_first_name" class="">Especie:</abbr></label>
										<ul>
								            <li>									        
										        <input type="radio" name="especie" value="robusta"  <?php echo  ( isset($datos['especie']) and $datos['especie'] == 'robusta') ? 'checked':'' ?>   required>Robusta
										        <input type="radio" name="especie" value="arabiga" <?php echo  (isset($datos['especie']) and $datos['especie'] == 'arabiga') ? 'checked':'' ?>>Arábiga
									         </li>
								        </ul>
									</p>	
								</div>
							</div>
						</div>
						<!--datos del café lado derecho-->
						<div class="col-md-6" >
							<div class="col-md-12" >
							    <h4>Forma de entrega</h4>
							    <h6 align="center">Molida</h6>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							    	<label for="" class="">Libra</label>
									<input class="contact-input" type="number" name="molidaLibra" value="<?php echo isset($datos['molidaLibra'])? $datos['molidaLibra'] : '';?>" required>
							     </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
									<input class="contact-input" type="number" name="molidaMediaLibra" value="<?php echo isset($datos['molidaMediaLibra'])? $datos['molidaMediaLibra'] : '';?>"  required>
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="molidaCincoLibras" value="<?php echo isset($datos['molidaCincoLibras'])? $datos['molidaCincoLibras'] : '';?>"  required>
							    </p>
							    <h6 align="center">En grano</h6>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							            <label for="" class="">Libra</label>
										<input class="contact-input" type="number" name="granoLibra" value="<?php echo isset($datos['granoLibra'])? $datos['granoLibra'] : '';?>"  required>
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
										<input class="contact-input" type="number" name="granoMediaLibra" value="<?php echo isset($datos['granoMediaLibra'])? $datos['granoMediaLibra'] : '';?>"  required>
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="granoCincoLibras" value="<?php echo isset($datos['granoCincoLibras'])? $datos['granoCincoLibras'] : '';?>"  required>
							    </p>
							</div>
							<div class="col-md-12" >
								<div  class="col-md-6">
									<label for="" class="">Cantidad</label>
										<input class="contact-input" type="text"  name="cantidad" value="<?php echo isset($datos['cantidad'])? $datos['cantidad'] : '';?>"  required>
								</div>
								<div  class="col-md-6" >
									<label for="" class="">Valor unitario</label>
										<input class="contact-input" type="text"  name="valorUnitario" value="<?php echo isset($datos['valorUnitario'])? $datos['valorUnitario'] : '';?>"  required>											
								</div>
								<div  class="col-md-6">
									<label>Estado:</label>
									<select name="estado" id="estado" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country"  required>
										   	<option value="">Seleccione..
										    </option>
										    <option value="recibido">Recibido</option>
										    <option value="rechazado">Rechazado</option>
										</select>																				
								</div>								
							</div>
							<!--Boton submit-->
							<div class="col-md-12 text-right">
								<!--<input class="btn btn-lg btn-brown" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>" >-->
	<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->
									    <input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_guardar_temporalmente')" class="btn btn-lg btn-brown" type="button" value="<?php echo (isset($datos['idLoteCafe']) and $datos['idLoteCafe'] !='-1')? "Guardar Cambios" : "Agregar";?>">
					
							</div>
						</div>																				
					</div>					
				</div>
				<div class="contact-form">
					<div style="background-color:#fff">
						<div class="col-md-12">
							<h4>Cafés agregados a la recepción</h4>
						</div>
						<!--TABLA CON EL CAFE(S) AGREGADOS A LA RECEPCIÓN-->
						<table class="shop_table shop_table_responsive cart" >
							<thead>
								<tr>
							        <!--<th class="product-remove">Codigo</th>-->
									<th class="product-remove">Peso</th>
									<th class="product-remove">Especie</th>
									<th class="product-remove">Variedad</th>
									<th class="product-remove">Humedad</th>
									<th class="product-remove">Factor rendimiento</th>
									<th class="product-remove">Tipo tueste</th>
									<th class="product-remove">Cantidad</th>
									<th class="product-remove">Valor</th>
									<th class="product-remove">Estado</th>
									<th class="product-remove">Acciones</th>
							    </tr>
							</thead>
							<tbody class="cart_item">
								<?php if (isset($datos['lotesArr'])) { foreach($datos['lotesArr'] as $cafe): ?>
								<tr class="">
									<!--<td class="product-remove">					
										<?php echo $cafe['codigoCafe']?>								
									</td>-->
									<td class="product-remove">					
										<?php echo $cafe['peso']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['especie']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['variedad']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['PorcentajeHumedad']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['factorRendimiento']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['tipoTueste']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['cantidad']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['valorUnitario']?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe['estado']?>								
									</td>
									<td class="product-remove">
										<!--<a href="<?php echo RUTA_URL;?>/Fincas/agregar/<?php echo $cafe->idcafe;?>">
										Editar</a>-->
										<!--boton de editar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->

												<input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Cafes/agregar_editar_temporal/<?php echo $cafe["idLoteCafe"];?>')" class="btn btn-lg btn-brown" type="button" value="Editar">	
									</td>
								</tr>
							<?php endforeach; }?>
							</tbody>
						</table>
					</div>
				</div>	
				<!--boton de guardar que no es submit, modifica el action del fomulario cuando se le hace click para poder tener varios action en un mismo form-->

				<?php if (isset($datos['lotesArr']) and count($datos['lotesArr'])>0) { ?>
									    <input align="center" onclick="submitForm('<?php echo RUTA_URL;?>/Recepciones/crear_guardar')" class="btn btn-lg btn-brown" type="button" value="finalizar">

									<?php }     ?>
				</form>				
			</div>
		</div>
	</div>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 
