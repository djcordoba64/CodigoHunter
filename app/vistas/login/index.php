
<?php require RUTA_APP . '/vistas/inc/header.php' ?> 
<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!-- 404 PAGE -->
<section class="page-login">
  <div class="container">                           
    <div class="center">        
        <div class="row">
          <div class="col-md-5 col-md-offset-3">
            <div class="opaco">
             <form  class="wp-searchform" action="<?php echo RUTA_URL;?>/Login/validar" method="POST">
              <h2>Iniciar sesión</h2>
                  <div class="quote">
                    <i class="fa fa-user-circle"></i>
                  </div>
                  <input class="input-text " name="identificacion"  placeholder="Numero de identificación.." value="" autocomplete="Numero de identificación" type="text" required>
               
                <p>
                  <div class="quote">
                     <i class="fa fa-unlock-alt"></i>
                  </div>
                  <input class="input-text " name="contrasena"  placeholder="Contraseña.." value="" autocomplete="Numero de identificación" type="password" required>
                 </p>
                  <div class="col-md-12 text-center">
                    <span class="error badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
                    <input class="btn btn-bordered" value="Entrar"  type="submit">
                  </div>
            </form>
            </div> 
          </div>
        </div>              
    </div>
  </div>
</section>



<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 