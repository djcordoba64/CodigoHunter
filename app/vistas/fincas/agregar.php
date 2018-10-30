<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="">
	<h3>Finca</h3>
	<h2>Registrar información de la finca</h2>
	<?php echo var_dump($datos) ?>
	<?php echo var_dump($listaDepartamentos); ?>
	<!-- REGISTRAR INFORMACIÓN DE LA FINCA!-->
	<form action="<?php echo RUTA_URL;?>/Fincas/agregar" method="POST">
		<div class="form-group">	
			<input type="hidden" name="idCliente" value="<?php echo $datos["idCliente"] ?>" >
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
			<p>
				<label for="departamento">Departamento
					<select name="cbx_departamento">
						<option value="0">--Seleccione--</option>
	   										
	 				</select>	 				
		 		</label>
	 		</p>
	 		<p>
	 		 	<label for="vereda">Vereda:
					<input type="text" class="" name="vereda">
				</label>
	 		 </p>
	 		 <label for="estado">Estado
					<select name="estado">
						<option value="0">--Seleccione--</option>
	   					<option value="Habilitado">Habilitado</option>
	   					<option value="Inhabilitado">Desabilitado</option>		  				
	 				</select>
	 		</label>
	 		<input class="" type="submit" value="Agregar">
		</div>		
	</form>
</div>

	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 