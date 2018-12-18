<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- CART --> 
<section class="">
    <div class="woocommerce">
      <div class="product-single"">
      <form class="" action="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_datos/" method="POST">
        <h2>Proceso de Torrefacción</h2>  
        <div class="container">
          <div class="row">
          <div class="col-md-7">
            <h4>Terminar Proceso</h4>
            <hr>
            <div class="col-md-12">
              <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="mermaTueste" class="">Merma tueste<span  style="color: #b89d64;font-size:20px"> </span><abbr class="required" title="required">*</abbr></label>
                  <div class="quantity">                  
                    <input type="number" name="mermaTueste"  min="1"  step="1" value="<?php echo isset($datos['mermaTueste'])? $datos['mermaTueste'] : '';?>" required>
                  </div>
              </div>
            </div>
                       
            <div class="woocommerce-additional-fields">
              <div class="woocommerce-additional-fields__field-wrapper">
                  <p class="form-row notes">
                    <label for="observacion" class="">Observación</label>
                    <textarea name="observacion" class="input-text"  rows="2" cols="5"></textarea>
                  </p>
              </div>
            </div>
            <div class="col-md-12 text-center" style="margin: 20px;">
            <!--Input -->                
              <input value="Cancelar" class="btn btn-lg btn-bordered" type="submit"/>
              <input value="Guardar" class="btn btn-lg btn-brown" type="submit"/>              
            </div>             
          </div>
          <div class="col-md-3 col-md-offset-1">

             <h4>
              <input hidden  name="codigoFinalizar" value="<?php echo $datos['codigoFinalizar'] ?>"/>
                  <input hidden  name="idcafe" value="<?php echo $datos['idcafe'] ?>"/>
             </h4>
            <aside class="shop-sidebar">
              <div class="widget-area">
                  <ul>
                      <li class="widget-container woocommerce widget_shopping_cart">
                          <div class="widget_shopping_cart_content">
                              <ul class="cart_list product_list_widget ">
                                  <li class="mini_cart_item">
                                     <div class="name"><strong>Lote</strong><br>      
                                      <span class="quantity">
                                        <span class="woocommerce-Price-amount amount" style="color: #b89d64;font-size:25px">
                                          <?php echo $datos['codigoCafe'] ?></span>
                                      </span>
                                  </li>
                                  <li class="mini_cart_item">
                                     <div class="name"><strong>Fecha</strong><br>                                     
                                      <span class="quantity">
                                        <span class="woocommerce-Price-amount amount" >
                                          <span class="woocommerce-Price-currencySymbol"> <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> </span> <?php echo date("m/d/Y g:ia"); ?></span>
                                      </span>
                                  </li>
                              </ul>
                              
                          </div>
                      </li>
                  </ul>
              </div>
            </aside>            
          </div> 
        </div>
      </div>    
      </form>
    </div>
  </div>
</section>
  <!-- CART END --> 

<div class="container">
  <div class="col-md-12">
    <h2>Torrefaccion</h2>
  </div>
  <div class="well well-sm">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_datos/" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar</h4>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <input hidden  name="codigoFinalizar" value="<?php echo $datos['codigoFinalizar'] ?>"/>
                  <input hidden  name="idcafe" value="<?php echo $datos['idcafe'] ?>"/>
                  <p>
                    <label for="codigoCafe" class="">Codigo café</label>
                    <input class="contact-input" type="text" disabled name="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>"/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="fechaHora" class="">fecha</label>
                    <input class="contact-input" type="text" disabled name="fechaHora" value="<?php echo date("m/d/Y g:ia"); ?>"/>                     
                </div>               
              </div>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="mermaTueste" class="">Merma Tueste</label>
                    <input class="contact-input" type="number" min="1" required  name="mermaTueste" value=""/>
                  </p>
                </div>              
              </div>
            </div>
            <div class="col-md-6" style="background-color: #fff">
              <h5 class="">Observación</h5>
              <div class="col-md-12" >
                  <textarea name="observacion"></textarea>                                                                 
              </div>               
            </div>
             <div class="col-md-12 text-center" style="margin: 42px;">
                <input value="Guardar" class="btn btn-lg btn-brown" type="submit"/>
            </div>
          </div>  
        </form>         
      </div>
    </div>
  </div>
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 