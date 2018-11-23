

<!-- Modal Registrar Trilla-->
<div class="modal fade" id="IniciarTrilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Proceso de trilla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p>
            <input type=""  name="idcafe" id="idcafe" value="<?php echo $datos['idcafe']?>">
            <label></label>
            <input type="" name="codigoCafe" id="idcafe" value="">
            </p>
            <p>
          	<p>
          	<label>Fecha y hora</label>
          	<input type="" name="fechaHora" id="fechaHora" value="">
           	</p>
           	<p>
              <label>Proceso</label>
              <input type="" name="fechaHora" id="fechaHora" value="">
            </p>
      	
      </div>
      <div class="modal-footer">
      <a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio_Trilla/<?php echo $datos['idcafe']?>">Iniciar</a>       
      </div>
    </div>
  </div>
</div>

