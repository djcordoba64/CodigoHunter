<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">
				<!--FORMULAIO DEL CAFÉ-->														
				<form class="contact-form" action="<?php echo RUTA_URL;?>/Cafes/registrar_agregar_cafes" method="POST">
					<div class="row" style="background-color:#fff" >
						<!--en el input hidden tare el id del cliente-->
						<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >
							<!--este campo me indica si el fomulario esta en modo edicion o agregar nuevo, y guarda el id de la finca a editar en el caso de edicion-->
						<input type="hidden" name="idDetalleFinca" value="<?php echo isset($datos['idDetalleFinca'])? $datos['idDetalleFinca'] : '-1';?>" >
						<!--datos del café lado izquierdo-->														
						<div class="col-md-6" >
							<h4>Datos del café</h4>
							<div class="col-md-12" >
								<label for="" class="">Codigo</label>
								<input type="text" name="codigoCafe" disabled >						
							</div>
							<div class="col-md-12">
								<label for="" class="">Foto</label>
								<input type="text" name="foto" >						
							</div>

							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Peso</label>
										<input class="contact-input" type="number" name="peso" value="">
									</p>
								</div>
								<div  class="col-md-6">
									<label for="" class="">Variedad</label>
										<input class="contact-input" type="text"  name="variedad" value="">											
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<p>
										<label for="" class="">Tipo de tueste</label>
										<input class="contact-input" type="text"  name="tipoTueste" value="">
									</p>
								</div>
								<div  class="col-md-6">
									<label>Materia prima:</label>
									<select name="materiaPrima" id="materiaPrima" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
										   	<option value="0">Seleccione..
										    </option>
										</select>																				
								</div>
							</div>
							<div class="col-md-12" >
								<div class="col-md-6">
									<label>Tipo de beneficio:</label>
									<select name="tipoBeneficio" id="tipoBeneficio" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
										   	<option value="0">Seleccione..
										    </option>
										</select>
								</div>
								<div  class="col-md-6">
									<p>
										<label for="" class="">Porcentaje de humedad</label>
										<input class="contact-input" type="number" name="PorcentajeHumedad" value="">
									</p>																				
								</div>
								<div class="col-md-6">
									<p>
										<label for="" class="">Factor de rendimiento</label>
										<input class="contact-input" type="number" name="factorRendimiento" value="">
									</p>
								</div>
								<div class="col-md-6">
									<p>
										<label for="billing_first_name" class="">Especie:</abbr></label>
										<ul>
								            <li>									        
										        <input type="radio" name="especie" value="obusta" >Robusta
										        <input type="radio" name="especie" value="arabiga" >Arábiga
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
									<input class="contact-input" type="number" name="molidaLibra" value="">
							     </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
									<input class="contact-input" type="number" name="molidaMediaLibra" value="">
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="molidaCincoLibras" value="">
							    </p>
							    <h6 align="center">En grano</h6>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							            <label for="" class="">granoLibra</label>
										<input class="contact-input" type="number" name="peso" value="">
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Media Libra</label>
										<input class="contact-input" type="number" name="granoMediLibra" value="">
							    </p>
							    <p class="swipebox col-lg-4 col-md-4 col-sm-6 col-xs-6">
							        <label for="" class="">Cinco libras</label>
									<input class="contact-input" type="number" name="granoCincoLibras" value="">
							    </p>
							</div>
							<div class="col-md-12" >
								<div  class="col-md-6">
									<label for="" class="">Cantidad</label>
										<input class="contact-input" type="text"  name="cantidad" value="">
								</div>
								<div  class="col-md-6" >
									<label for="" class="">Valor unitario</label>
										<input class="contact-input" type="text"  name="valorUnitario" value="">											
								</div>
								<div  class="col-md-6">
									<label>Estado:</label>
									<select name="estado" id="estado" style="width: 100%" class="country_to_state country_select select2-hidden-accessible" autocomplete="country">
										   	<option value="0">Seleccione..
										    </option>
										    <option value="recibido">Recibido</option>
										    <option value="rechazado">Rechazado</option>
										</select>																				
								</div>								
							</div>
							<!--Boton submit-->
							<div class="col-md-12 text-right">
								<input class="btn btn-lg btn-brown" type="submit" value="<?php echo (isset($datos['idDetalleFinca']))? "Guardar Cambios" : "Agregar";?>" >
							</div>
						</div>																				
					</div>					
				</form>
				<div class="contact-form">
					<div style="background-color:#fff">
						<div class="col-md-12">
							<h4>Cafés agregados a la recepción</h4>
						</div>
						<!--TABLA CON EL CAFE(S) AGREGADOS A LA RECEPCIÓN-->
						<table class="shop_table shop_table_responsive cart" >
							<thead>
								<tr>
							        <th class="product-remove">Codigo</th>
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
								<?php if (isset($datos['cafes'])) { foreach($datos['cafes'] as $cafe): ?>
								<tr class="">
									<td class="product-remove">					
										<?php echo $cafe->codigoCafe;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->peso;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->especie;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->variedad;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->PorcentajeHumedad;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->factorRendimiento;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->tipoTueste;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->cantidad;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->valorUnitario;?>								
									</td>
									<td class="product-remove">					
										<?php echo $cafe->estado;?>								
									</td>
									<td class="product-remove">
										<a href="<?php echo RUTA_URL;?>/Fincas/agregar/<?php echo $cafe->idcafe;?>">
										Editar</a>
									</td>
								</tr>
							<?php endforeach; }?>
							</tbody>
						</table>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 
