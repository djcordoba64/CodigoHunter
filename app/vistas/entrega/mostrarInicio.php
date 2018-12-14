<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div>
	<div class="col-md-12">
		<h2>Gestión de entrega</h2>
	</div>
	<div class="container" >
		<div class="product-single">
		    <div class="row">
		        <div class="col-md-12">	           
					<div class="widget-area" role="complementary"">
						<aside class="widget">
							<div class="col-sm-12" style="margin: 20px;">
								<u style="color: #b89d64; "><p  style="color: #b89d64; font-size:35px">Búsqueda</p></u>							
							</div>
							<div class="col-sm-12">
								<div class="col-sm-4">
									<div class="content">
										<div class="form wp-searchform" method="get">
											<label>*Fecha</label>
											<div class='input-group date' id='divMiCalendario'>

						                      <input type='text' id="txtFecha" readonly/>
						                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
						                      </span>
						                  </div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="content">
										<div class="form wp-searchform" method="get">
											<label>*Número de documento del cliente</label>
											<input  type="text" name="B_x_documento"  id="B_x_documento" placeholder="Documento de identidad" filterForColumn="4">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="content">
										<div class="form wp-searchform" method="get">
											<label>*Número de recibo</label>
											<div class="quantity">									
										         <input style="background-color: #fff" type="number" name="cantidad" id="BNumeroRecibo"  min="1"  step="1" value="" required>
											</div>
									
										</div>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-sm-12"  style="margin: 20px;">
					<label>*Lista de la recepciones.</label><i class="glyphicon glyphicon-arrow-down"></i></div>
					<div  style="margin: 20px;">
						<table class="shop_table shop_table_responsive cart" id="tbl_recepcionE" >
							<thead>
							    <tr class="header">
							        <th style="font-size:14px" class="product-remove" >Fecha</th>  
							        <th style="font-size:14px" class="product-remove" >N° recibo</th>
							        <th style="font-size:14px" class="product-remove" >Cliente</th>
									<th style="font-size:14px" class="product-remove" >Documento</th>
							        <th style="font-size:14px" class="product-remove">Estado de la recepción</th>
									<th style="font-size:14px" class="product-remove">Acciones</th>          							
								</tr>
							</thead>
							<tbody  class="cart_item">
								<?php foreach($datos['recepciones']  as $recepcion): ?>
								<tr class="cart_item">
									<td class="product-remove"><?php echo $recepcion->fecha;?></td>
									<td class="product-remove"><?php echo $recepcion->numeroRecibo;?></td>	
									<td class="product-remove"><?php echo $recepcion->Cliente;?></td>
									<td class="product-remove"><?php echo $recepcion->documento;?></td>
									<td class="product-remove"><?php echo $recepcion->estado;?></td class="product-remove">
									<td class="product-remove">
										<a data-toggle="tooltip" title="Ver información!" href="<?php echo RUTA_URL;?>/Entrega/detalle/<?php echo $recepcion->numeroRecibo;?>" class="btn btn-sm btn-default" >
										<span class=""></span>Detalle</a>
										<a data-toggle="tooltip" title="Generar Recibo e informe!" href="<?php echo RUTA_URL;?>/Entrega/mostrar_generarFactura/<?php echo $recepcion->numeroRecibo;?>" class="btn btn-sm btn-default" >
										<span class=""></span>Seleccionar
										</a>
									</td class="product-remove">
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					 <div class="col-md-12">
						<div class="paging-navigation">
							<hr>
							<div class="pagination">
								<a class="prev <?php  echo $datos['pagina']<= 1? 'disabled' :'' ?>  " href="<?php echo RUTA_URL;?>/Entrega/index/<?php echo ($datos['pagina']-1)?>" >
							          <i class="fa fa-chevron-left" aria-hidden="true"></i>Anterior
							    </a>
								<?php for ($i=0; $i<$datos['numeroPaginas'] ; $i++): ?>
									<a href="<?php echo RUTA_URL;?>/Entrega/index/<?php echo $i+1 ?> " class="page-numbers current <?php echo $datos['pagina']==$i+1 ? 'active':''?> "><?php echo $i+1 ?></a>
							   <?php endfor?>							                
							     <a  class="next <?php  echo $datos['pagina']>= $datos['numeroPaginas'] ? 'disabled' :'' ?>"  href="<?php echo RUTA_URL;?>/Entrega/index/<?php echo $datos['pagina']+1 ?>">Siguiente
							         <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
							</div>
						</div>
	        		</div>     								
		        </div>
		    </div>
		</div>
	</div>	
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>