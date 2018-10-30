<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="">
	<h3>Finca</h3>
	<h2>Registrar información de la finca</h2>
<?php var_dump($datos)?>
	<!-- REGISTRAR INFORMACIÓN DE LA FINCA!-->
	<form action="<?php echo RUTA_URL;?>/Fincas/agregar" method="POST">
		<div class="form-group">	
			<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"]?>>
			<p>
				<label for="nombreFinca">Nombre:<sub>*</sub>
					<input type="text" class="" name="nombreFinca">
				</label>

				<label for="temperatura">Temperatura:
					<input type="text" class="" name="segundoNombre">
				</label>
			</p> 
			<p>
				<label form="coordenadasGogle">Coordenadas Gogle
					<input type="text" class="" name="coordenadasGogle">
				</label>
			</p>
			<label for="rol">Departamento
					<select name="rol">
	   					<option value=""></option>
		  				
	 				</select>
	 		</label>
	 		 <p>
	 		 	<label for="vereda">Vereda:
					<input type="text" class="" name="vereda">
				</label>
	 		 </p>
	 		 <label for="estado">Estado
					<select name="estado">
	   					<option value="Habilitado"></option>
	   					<option value="Inhabilitado"></option>		  				
	 				</select>
	 		</label>
	 		<input class="" type="submit" value="Agregar">
		</div>		
	</form>
</div>

	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 