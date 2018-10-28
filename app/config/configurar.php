<?php 

//---CONFIGURARACIÓN DE ACCESO A LA BASE DE DATOS-------credenciales-------------------
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_PASSWORD', '');
define('DB_NOMBRE', 'hunter');

//-------------Rutas de la aplicación----------------------- 
//echo dirname(dirname(__FILE__));
define('RUTA_APP' , dirname(dirname(__FILE__) )); //C:\xampp\htdocs\Hunter\app


//------Ruta url Ej: http://localhost/Hunter/------------------
define ('RUTA_URL' , ' http://localhost:80/Hunter');

//-----NOMBRE DEL SITIO HUNTER---------------------------------
define ('NOMBRESITIO' , 'HUNTER');



 ?>