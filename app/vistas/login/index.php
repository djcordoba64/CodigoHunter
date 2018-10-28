<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="viewport" content="width= device=width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="id=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/estilos.css">
  <title><?php echo NOMBRESITIO;?></title>
</head>
<body>
  <h1 align="center">Inicio sesion</h1>
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
  </form>
<script type="text/javascript" src="<?php echo RUTA_URL ; ?>/
  js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>