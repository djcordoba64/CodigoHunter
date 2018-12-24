<?php require RUTA_APP . '/vistas/inc/header.php' ?>



<!-- TESTIMONIALS -->
	<section class="testimonials">

		<div class="container">
			<div class="row">
				<a href="<?php echo RUTA_URL;?>/Recepciones/index" class="btn btn-light"><i class="glyphicon glyphicon-hand-left"></i> Salir</a>
				<div class="col-md-12"><h2>Información de la recepción</h2></div>
				<div class="col-md-8 col-md-offset-2 testimonials-list">
					<div class="review-itemE">						
					    		<div class="name">Recepción</div>
					    		<div class="icon">		
									<i class="fa fa-quote-left"></i>
								</div>
								<div class="content-datos">
									<div class="name-datos">Datos de la recepción</div>
									<div class="col-md-6 info-datos">
										<div class="intem">
											<div class="item">
												Fecha:<label class="dato"><?php echo $datos['fecha']?></label>
											</div>
										</div>
										<div class="intem">
											<div class="item">
												Numero de recibo: <label class="dato"><?php echo $datos['numeroRecibo']?></label></div>
										</div>

									</div>																
								</div>
							</div>
					</div>
				<div class="col-md-8 col-md-offset-2 testimonials-list">
							<div class="content-datos">
								<div class="name-datos">Datos del cliente</div>
								<div class="col-md-6 info-datos">
									<div class="intem">
										<div class="item">
											Nombre:<label class="dato"><?php echo $datos['primerNombre'].'
											'.$datos['primerApellido'] ?></label>
										</div>
									</div>
									<div class="intem">
										<div class="item">
											Documento: <label class="dato"><?php echo $datos['documentoIdentidad']?></label></div>
									</div>
									<div class="intem">
										<div class="item">Dirección: <label class="dato"><?php echo $datos['direccion']?></label></div>
									</div>

								</div>
								<div class="col-md-6 info-datos">
									<div class="intem">
										<div class="item">Correo: <label class="dato"><?php echo $datos['correo']?></label></div>
									</div>
									<div class="intem">
										<div class="item">Teléfono/Celular: <label class="dato"><?php echo $datos['numeroContacto']?></label></div>
									</div>
								</div>																
							</div>
							<div class="content-datos">
								<div class="name-datos">Datos de la finca</div>
								<div class="col-md-6 info-datos">
									<div class="intem">
										<div class="item">
											Nombre: <label class="dato"> <?php echo $datos['nombreFinca'] ?></label>
										</div>
									</div>
									<div class="intem">
										<div class="item">
											Municipio: <label class="dato"> <?php echo $datos['municipio']?></label></div>
									</div>
									<div class="intem">
										<div class="item">Vereda: <label class="dato"> <?php echo $datos['Vereda']?></label></div>
									</div>

								</div>
								<div class="col-md-6 info-datos">
									<div class="intem">
										<div class="item">Temperatura promedio: <label class="dato"> <?php echo $datos['temperatura']?> ℃</label></div>
									</div>
								</div>																
							</div>				    		
				    	</div>
				    	<hr>
			    	</div>
			    	<div class="col-md-10 col-md-offset-1 testimonials-list">
			    	<div class=" content-datos">
								<div class="name-datos">Lotes de café agregados</div>
								<div class="col-md-6 info-datos">
									<div class="col-md-6 text-page">
									    <table class="table table-bordered">
								    	<thead>
								    		<tr>
									    		
									    		<th style="font-size:14px;text-align: center;color: #fff " colspan="10">Descripción</th>
									    		<th style="font-size:14px;text-align: center;color: #fff"  colspan="7">Forma de entrega</th>
								    		</tr>

								    		
								    	</thead>
								    		<tr >
									    		
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Lote</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Peso</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Especie</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Variedad</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Humedad</th>						
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Factor Rendimiento</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Tostion</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Materia Prima</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Tipo de Beneficio</th>
									    		<th style="font-size:8px;text-align: center" ROWSPAN=2>Estado</th>
									    		<th style="font-size:8px;text-align: center" colspan="3">Molida</th>
									    		<th style="font-size:8px;text-align: center" colspan="3">Gano</th>
									    		<th style="font-size:8px;text-align: center"  ROWSPAN=2>Agranel</th>
									    		
								    		</tr>

								    		<tr>
									    		
									    		<th style="font-size:10px" >Lb</th>
									    		<th style="font-size:10px" >1/2 Lb</th>
									    		<th style="font-size:10px" >5 Lb</th>
									    		<th style="font-size:10px" >Lb</th>
									    		<th style="font-size:10px" >1/2 Lb</th>
									    		<th style="font-size:10px" >5 Lb</th>
									    	
								    		</tr>
								    	<tbody>
								    		<?php foreach($datos['lotes']  as $cafe): ?>
								    		<tr>					
								                
								                <td style="font-size:12px" scope="row"><?php echo $cafe->codigoCafe?></td>
								                <td style="font-size:12px"><?php echo $cafe->peso?></td>
								                <td style="font-size:12px"><?php echo $cafe->especie?></td>
								                <td style="font-size:12px"><?php echo $cafe->variedad?></td>
								                <td style="font-size:12px"><?php echo $cafe->factorRendimiento?></td>
								                <td style="font-size:12px"><?php echo $cafe->porcentajeHumedad?></td>
								                <td style="font-size:12px"><?php echo $cafe->tipoTueste?></td>
								                <td style="font-size:12px"><?php echo $cafe->materiaprima?></td>
								                <td style="font-size:12px"><?php echo $cafe->tipobeneficio ?></td>
								                <td style="font-size:12px"><?php echo $cafe->estado?></td>
								                <td style="font-size:12px"><?php echo $cafe->molidaLibra?> </td>
								                <td style="font-size:12px"><?php echo $cafe->molidaMediaLibra?></td>
								                <td style="font-size:12px"><?php echo $cafe->molidaCincoLibras?> </td>
								                <td style="font-size:12px"><?php echo $cafe->granoLibra?> </td>
								                <td style="font-size:12px"><?php echo $cafe->granoMediaLibra?> </td>
								                <td style="font-size:12px"><?php echo $cafe->granoCincoLibras?> </td>
								                <td style="font-size:12px"><?php echo $cafe->agranel?></td>
								                
				            				</tr>
				            				<?php endforeach;?>
								    		
								    	</tbody>
								    </table>
									</div>
								</div>															
					</div>
					</div>					
				</div>
				
			</div>
		</div>
	</section>
<!-- TESTIMONIALS END -->




<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 