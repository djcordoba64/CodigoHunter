<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <h1 align="center">Inicio sesion</h1>
 <form action="<?php echo RUTA_URL;?>Login/sining" method="POST">
    <div class="container" align="center">
      <p >
        <label for="usuario"><b>Usuario</b></label>
        <input type="text" placeholder="Ingrese el documento" name="usuario" >
      </p>
      <p >
        <label for="contrasena"><b>Contrasena</b></label>
        <input type="password" placeholder="Ingrese la Contrasena" name="contrasena" >
        <?php !empty($errors_message)? print($errors_message):'';?>
      </p>
      <p>
        <input type="submit" name="" value="Iniciar">
      </p>
      
    </div>
  </form>
</body>
</html>