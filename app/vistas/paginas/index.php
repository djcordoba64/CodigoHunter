<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<?php require RUTA_APP . '/vistas/inc/header.php' ?> 
<h1>Inicio</h1>

 <p>
  

        <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>
        <span class="badge badge-warning"><?php isset($datos["mensaje_advertencia"])? print($datos["mensaje_advertencia"]):''; ?></span>
      </p>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 