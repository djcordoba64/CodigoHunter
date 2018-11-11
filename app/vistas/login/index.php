<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<?php require RUTA_APP . '/vistas/inc/header.php' ?> 

<section class="cart-wrap">
    <div class="woocommerce">
      <form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Login/validar" method="POST">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div id="customer_details">
                <div class="woocommerce-billing-fields">
                    <div class="col-md-12"><h3>Iniciar Sesión</h3></div>
                    <div class="woocommerce-billing-fields__field-wrapper">
                        
                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                            <label for="billing_company" class="">Número de identificación</label>
                            <input class="input-text " name="identificacion" id="billing_company" placeholder="Numero de identificación" value="" autocomplete="Numero de identificación" type="text">
                        </p>

                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                            <label for="billing_company" class="">Contraseña</label>
                            <input class="input-text " name="contrasena" id="billing_company" placeholder=" Contraseña" value="" autocomplete="Numero de identificación" type="password">
                        </p>
                        
                        <div class="form-row place-order">
                          <div class="col-md-6 col-md-offset-3 text-center">
                            <input class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Entrar" data-value="Place order" type="submit">
                          </div>
                        </div>


                        <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">

                          <div class="col-md-12 text-center">
                          <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
                          <span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
                          </div>
                        </p>
                    </div>
                </div>
                
            </div>  
          </div>
          <div class="col-md-4 col-md-offset-2">
            
            </div>
          </div>
        </div>
      </div>
    
    </form>
    </div>
  </section>


 <!-- <h1 align="center">Inicio sesion</h1>
 <form action="<?php echo RUTA_URL;?>/Login/validar" method="POST">
    <div class="container" align="center">
      <p >
        <label for="usuario"><b>Numero de identificacion</b></label>
        <input type="text" placeholder="Ingrese el documento" name="identificacion" >
      </p>
      <p >
        <label for="contrasena"><b>Contrasena</b></label>
        <input type="password" placeholder="Ingrese la Contrasena" name="contrasena" >

      </p>
      <p>
  

        <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
        <span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
      </p>

      <p>
        <input type="submit" name="" value="Iniciar">
      </p>
      
    </div>
  </form>-->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 