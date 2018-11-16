<?php 
      

    class Persona{
    	private $db;

    	public function __construct(){
    		$this->db = new Base;
    	}
    #---------------------------------------****USUARIOS*******-------------------------------       
      
    	public function obtenerUsuarios(){
        //Hacemos la consulta para obtener todos lo usuarios registrados.
    		$this->db->query("SELECT * FROM personas WHERE tipoPersona='usuario'");
            $listaUsuarios=$this->db->registros();
    		   return $listaUsuarios;
    	}

      public function obtenerUsuariosLimit($iniciar,$usuarios_x_pagina){
        //Hacemos la consulta para obtener todos lo usuarios registrados.
        $this->db->query(" SELECT * FROM personas where tipoPersona='usuario' LIMIT :iniciar,:nusuarios");
        $this->db->bind(':iniciar',$iniciar,PDO::PARAM_INT);
        $this->db->bind(':nusuarios',$usuarios_x_pagina,PDO::PARAM_INT);
            $listaUsuarios=$this->db->registros();
           return $listaUsuarios;
      }


      public function contarUsuarios(){
        $this->db->query("SELECT count(*) as cuenta FROM personas where tipoPersona='usuario'");
            return $this->db->registro();                
      }

      //--------AGREGAR UN NUEVO USURIO-------------------------------------------------------------
      //Agregamos un nuevo usuario ---CRUD con MVC(PDO)-link->https://www.youtube.com/watch?v=rTzwrVQFMHs
      public function agregarUsuario($datos){

            //VALIDACIONES
           $this->db->query("SELECT documentoIdentidad existe from personas where documentoIdentidad = :documentoIdentidad and tipoPersona = 'usuario'");            
           $this->db->bind(':documentoIdentidad',$datos['documentoIdentidad']);
           $existe=$this->db->execute();
           $existe=$this->db->contarFilas();

           if($existe>0)
           {
            // -2 significa que el usuario ya existe (numero de identificacion ya registrado)
            return -2;       
           }

           $this->db->query("INSERT INTO personas (
                                primerNombre,segundoNombre,primerApellido, segundoApellido, documentoIdentidad,fechaNacimiento,sexo,correo,numeroContacto,direccion,tipoPersona,rol,contrasena, estado, created_at, created_by) 
                                VALUES (
                                :primerNombre,:segundoNombre,:primerApellido, :segundoApellido, :documentoIdentidad, 
                                :fechaNacimiento,:sexo,:correo, :numeroContacto, :direccion, 'usuario', :rol, :contrasena,:estado, NOW(), :created_by)
                            ");

           //VINCULAR LOS VALORES --- BIND(sentencias preparadas)---
           $this->db->bind(':primerNombre'    ,  $datos['primerNombre']);
           $this->db->bind(':segundoNombre'   ,  $datos['segundoNombre']);
           $this->db->bind(':primerApellido'  ,  $datos['primerApellido']);
           $this->db->bind(':segundoApellido' ,  $datos['segundoApellido']);
           $this->db->bind(':documentoIdentidad',$datos['documentoIdentidad']);
           $this->db->bind(':fechaNacimiento' ,  $datos['fechaNacimiento']);
           $this->db->bind(':sexo'            ,  $datos['sexo']);
           $this->db->bind(':correo'          ,  $datos['correo']);
           $this->db->bind(':numeroContacto'  ,  $datos['numeroContacto']);
           $this->db->bind(':direccion'       ,  $datos['direccion']);
           //$this->db->bind(' :tipoPersona'     , 'usuario');
           $this->db->bind(':rol'             ,  $datos['rol']);
           $this->db->bind(':contrasena'      ,  $datos['contrasena']);
           $this->db->bind(':estado'          ,  $datos['estado']);
           $this->db->bind(':created_by'          ,  $_SESSION['idUsuario']);

           //EJECUTAMOS LA CONSULTA ----Execute

           if ($this->db->execute()){           
             //consulta ultimo id
             $id = $this->db->obtenerUltimoId();
             //retorna ultimo id
             return $id; 
           }
           else{
            // -1 significa que fallo el insert
            return -1;
           }


        }
        //----------------------------EDITAR USUARIO------------
        //Mostramos la información de un usuario que se haya seleccionado para ser editado.--link->https://www.youtube.com/watch?v=8RwF0zDNjbQ
        public function obtenerUsuarioId($idPersona){
            $this->db->query( "SELECT * FROM personas where idPersona=:idPersona and tipoPersona='usuario'");
            $this->db->bind(':idPersona',$idPersona);
            $fila=$this->db->registro();
            return $fila;

        }
        
        //Preparamos la consulta
        public function editarUsuario($datos){
             $this->db->query('UPDATE personas SET primerNombre=:primerNombre, 
                segundoNombre=:segundoNombre, 
                primerApellido=:primerApellido,
                segundoApellido=:segundoApellido,
                fechaNacimiento=:fechaNacimiento,
                sexo=:sexo,
                correo=:correo,
                numeroContacto=:numeroContacto,
                direccion=:direccion,
                rol=:rol,
                contrasena=:contrasena, 
                estado=:estado, 
                updated_at= NOW(),
                updated_by = :updated_by 
                where idPersona= :idPersona
                ');
        
            //vinculamos los valores
            $this->db->bind(':idPersona',  $datos['idPersona']);
            $this->db->bind(':primerNombre'    ,  $datos['primerNombre']);
            $this->db->bind(':segundoNombre'   ,  $datos['segundoNombre']);
            $this->db->bind(':primerApellido'  ,  $datos['primerApellido']);
            $this->db->bind(':segundoApellido' ,  $datos['segundoApellido']);
            $this->db->bind(':fechaNacimiento' ,  $datos['fechaNacimiento']);
            $this->db->bind(':sexo'            ,  $datos['sexo']);
            $this->db->bind(':correo'          ,  $datos['correo']);       
            $this->db->bind(':numeroContacto'  ,  $datos['numeroContacto']);
            $this->db->bind(':direccion'       ,  $datos['direccion']);
            $this->db->bind(':rol'             ,  $datos['rol']);
            $this->db->bind(':contrasena'      ,  $datos['contrasena']);
            $this->db->bind(':estado'          ,  $datos['estado']);
            $this->db->bind(':updated_by'      ,  $_SESSION['idUsuario']);

            if ($this->db->execute()){           
                return 0;
            }
            else{
                return -1;
            }

        }
        //PERFIL---
        public function obtenerDatosPorIdUsuario($idUsuario){
          $this->db->query( "SELECT * FROM personas where idPersona=:idUsuario and tipoPersona='usuario'");
            $this->db->bind(':idPersona',$idUsuario);
            $fila=$this->db->registro();
            return $fila;
        }

        //-------LOGIN---------------------------------------------------------------------

        public function credencialesCorrectas($identificacion, $contrasena){
            $this->db->query( 'SELECT count(1) as existe FROM personas where documentoIdentidad=:documentoIdentidad and contrasena=:contrasena');
            $this->db->bind(':documentoIdentidad',$identificacion);
            $this->db->bind(':contrasena',$contrasena);
            $fila=$this->db->registro();
            return $fila->existe==1;
        }

        public function obtenerDatosPorIdentificacion($identificacion){
            $this->db->query( 'SELECT * FROM personas where documentoIdentidad=:documentoIdentidad');
            $this->db->bind(':documentoIdentidad',$identificacion);
            $fila=$this->db->registro();
            return $fila;
        }

        #----------------***CLIENTES****------------------------------------------------

        //Obtenemos los clientes registrados para mostrarlos en la vista (index).
        public function obtenerClientes(){
         $this->db->query("SELECT * FROM personas WHERE tipoPersona='cliente'");
            $listaClientes=$this->db->registros();
        return $listaClientes;
       }
       //----REGISTRAR UN NUEVO CLIENTE------------------
     
        public function agregarCliente($datos){
          //validamos si un cliente está registrado con el número de cédula.
          $this->db->query("SELECT documentoIdentidad existe from personas where documentoIdentidad = :documentoIdentidad and tipoPersona = 'cliente'");            
           $this->db->bind(':documentoIdentidad',$datos['documentoIdentidad']);
           $existe=$this->db->execute();
           $existe=$this->db->contarFilas();

           if($existe>0)
           {
            // -2 significa que el cliente ya existe (numero de identificacion ya registrado)
            return -2;       
           }    
           $this->db->query("INSERT INTO personas (
                                primerNombre,segundoNombre,primerApellido, segundoApellido, documentoIdentidad,fechaNacimiento,sexo,correo,numeroContacto,direccion,tipoPersona, estado, created_at,created_by) 
                                VALUES (
                                :primerNombre,:segundoNombre,:primerApellido, :segundoApellido, :documentoIdentidad, 
                                :fechaNacimiento,:sexo,:correo, :numeroContacto, :direccion,'cliente',:estado, NOW(),:created_by)
                            ");

           //VINCULAR LOS VALORES --- BIND(sentencias preparadas)---
           $this->db->bind(':primerNombre'    ,  $datos['primerNombre']);
           $this->db->bind(':segundoNombre'   ,  $datos['segundoNombre']);
           $this->db->bind(':primerApellido'  ,  $datos['primerApellido']);
           $this->db->bind(':segundoApellido' ,  $datos['segundoApellido']);
           $this->db->bind(':documentoIdentidad',$datos['documentoIdentidad']);
           $this->db->bind(':fechaNacimiento' ,  $datos['fechaNacimiento']);
           $this->db->bind(':sexo'            ,  $datos['sexo']);
           $this->db->bind(':correo'          ,  $datos['correo']);
           $this->db->bind(':numeroContacto'  ,  $datos['numeroContacto']);
           $this->db->bind(':direccion'       ,  $datos['direccion']);
           $this->db->bind(':estado'          ,  $datos['estado']);
           $this->db->bind(':created_by', $_SESSION['idUsuario']);

          //EJECUTAMOS LA CONSULTA ----Execute

           if ($this->db->execute()){           
             //consulta ultimo id
             $idCliente = $this->db->obtenerUltimoId();
             //retorna ultimo id
             return $idCliente; 
           }
           else{
            // -1 significa que fallo el insert
            return -1;
           }      

        }
      

       //----------------------------Ver detalle------------
        //Mostramos la información de un usuario que se haya seleccionado para mostrar el detalle.
        public function obtenerClienteID($idPersona){
            $this->db->query( "SELECT * FROM personas where idPersona=:idPersona and tipoPersona='cliente'");
            $this->db->bind(':idPersona',$idPersona);
            $fila=$this->db->registro();
            return $fila;

        }
        //-------EDITAR PERFIL DEL USUARIO----
        public function editarUsuarioPerfil($datos){
          $this->db->query('UPDATE personas SET correo=:correo, numeroContacto=:numeroContacto,direccion=:direccion, updated_at= NOW(), updated_by = :updated_by where idPersona= :idPersona');

           //vinculamos los valores
            $this->db->bind(':idPersona',  $datos['idPersona']);
             $this->db->bind(':correo'       ,  $datos['correo']);
            $this->db->bind(':numeroContacto'  ,  $datos['numeroContacto']);
            $this->db->bind(':direccion'       ,  $datos['direccion']);           
            $this->db->bind(':updated_by'      ,  $_SESSION['idUsuario']);

            if ($this->db->execute()){           
                return 0;
            }
            else{
                return -1;
            }
        }


        //--------------------------------------------
        //__CLIENTES_RECEPCIÖN--------
        //validar si existe un cliente con el número de identificación(1=exite)
        public function clienteExiste($documentoIdentidad){
            $this->db->query( "SELECT count(1) as existe FROM personas where documentoIdentidad=:documentoIdentidad " );
            $this->db->bind(':documentoIdentidad',$documentoIdentidad);
            $fila=$this->db->registro();
            return $fila->existe==1;
        }
        //Obtenemos la información del cliente
        public function obtenerClienteDocumento($documentoIdentidad){
        $this->db->query(" SELECT * FROM personas WHERE documentoIdentidad=:documentoIdentidad ");

        //vinculamos los valores de la consulta
        $this->db->bind(':documentoIdentidad', $documentoIdentidad);

        $datoscliente=$this->db->registro();
        return $datoscliente;
      }
        
        //se usa cuando el cliente esta mal creado y se necesita deshacer los datos guardados
        public function eliminarClienteId($idPersona){
            $this->db->query( "delete FROM personas where idPersona=:idPersona and tipoPersona='cliente'");
            $this->db->bind(':idPersona',$idPersona);
            return $this->db->execute();
            
        }
        
    }
       
 ?>