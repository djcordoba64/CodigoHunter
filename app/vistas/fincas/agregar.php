<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<a href="<?php echo RUTA_URL;?>/Cliente/index" class="btn btn-light"><i class="fa fa-backward"></i>atras</a>
	<h3>Registrar información de la finca finca</h3>

	<!-- REGISTRAR INFORMACIÓN DE LA FINCA!-->
	<form action="<?php echo RUTA_URL;?>/Fincas/agregar" method="POST">
		<div class="form-group">			
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
	<!-- LISTA DE LAS FINCAS AGREGADAS!-->
	<div>
		<h1>Lista de los Usuarios</h1>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Coordenadas Gogle</th>
					<th>Altitud zona</th>
					<th>Temperatura</th>
					<th>Municipio</th>
					<th>Vereda</th>
					<th>Estado</th>
					<th>Acciones</th>			
				</tr>
			</thead>
			<body>
				
			</body>
		</table>
	</div>
	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 