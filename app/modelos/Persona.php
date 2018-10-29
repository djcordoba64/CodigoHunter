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
          var_dump($datos);
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
            $this->db->query( 'SELECT * FROM personas where idPersona=:idPersona');
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
                usuario=:usuario,
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
            $this->db->bind(':usuario'         ,  $datos['usuario']);
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

        #----------------***CLIENTES****------------------------------------------------
        //Obtenemos los clientes de la base de datos.
        public function obtenerClientes(){
        $this->db->query("SELECT * FROM personas WHERE tipoPersona='cliente'");
            $listaClientes=$this->db->registros();
        return $listaClientes;
       }
       //Agregar un nuevo cliente
      public function agregarCliente($datos){

           $this->db->query('INSERT INTO personas (
                                primerNombre,segundoNombre,primerApellido, segundoApellido, documentoIdentidad,fechaNacimiento,sexo,correo,numeroContacto,direccion,tipoPersona, estado, created_at) 
                                VALUES (
                                :primerNombre,:segundoNombre,:primerApellido, :segundoApellido, :documentoIdentidad, 
                                :fechaNacimiento,:sexo,:correo, :numeroContacto, :direccion, :tipoPersona,:estado, NOW())
                            ');

           //VINCULAR LOS VALORES --- BIND(sentencias preparadas)---
           $this->db->bind(' :primerNombre'    ,  $datos['primerNombre']);
           $this->db->bind(' :segundoNombre'   ,  $datos['segundoNombre']);
           $this->db->bind(' :primerApellido'  ,  $datos['primerApellido']);
           $this->db->bind(' :segundoApellido' ,  $datos['segundoApellido']);
           $this->db->bind(' :documentoIdentidad',$datos['documentoIdentidad']);
           $this->db->bind(' :fechaNacimiento' ,  $datos['fechaNacimiento']);
           $this->db->bind(' :sexo'            ,  $datos['sexo']);
           $this->db->bind(' :correo'          ,  $datos['correo']);
           $this->db->bind(' :numeroContacto'  ,  $datos['numeroContacto']);
           $this->db->bind(' :direccion'       ,  $datos['direccion']);
           $this->db->bind(' :tipoPersona'     , 'cliente');
           $this->db->bind(' :estado'          ,  $datos['estado']);

           //EJECUTAMOS LA CONSULTA ----Execute

           if ($this->db->execute()){           
            return true;
           }else{
            return false;
           }


        }
        //----------------------------------------------------------------------------

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
    }
       
 ?>