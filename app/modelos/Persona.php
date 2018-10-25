<?php 
      

    class Persona{
    	private $db;

    	public function __construct(){
    		$this->db = new Base;
    	}
        #------------------****USUARIOS*******-----------------------------------------------------------------------        
        //Listamos todos lo usuarios registrados
    	public function obtenerUsuarios(){
    		$this->db->query("SELECT * FROM personas WHERE tipoPersona='usuario'");
            $listaUsuarios=$this->db->registros();
    		return $listaUsuarios;
    	}
        //Agregamos un nuevo usuario ---CRUD con MVC(PDO)-link->https://www.youtube.com/watch?v=rTzwrVQFMHs
        public function agregarUsuario($datos){

           $this->db->query('INSERT INTO personas (
                                primerNombre,segundoNombre,primerApellido, segundoApellido, documentoIdentidad,fechaNacimiento,sexo,correo,numeroContacto,direccion,tipoPersona,usuario,rol,contrasena, estado, created_at) 
                                VALUES (
                                :primerNombre,:segundoNombre,:primerApellido, :segundoApellido, :documentoIdentidad, 
                                :fechaNacimiento,:sexo,:correo, :numeroContacto, :direccion, :tipoPersona, :usuario, :rol, :contrasena,:estado, NOW())
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
           $this->db->bind(' :tipoPersona'     , 'usuario');
           $this->db->bind(' :usuario'         ,  $datos['usuario']);
           $this->db->bind(' :rol'             ,  $datos['rol']);
           $this->db->bind(' :contrasena'      ,  $datos['contrasena']);
           $this->db->bind(' :estado'          ,  $datos['estado']);

           //EJECUTAMOS LA CONSULTA ----Execute

           if ($this->db->execute()){           
            return true;
           }else{
            return false;
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
                documentoIdentidad=:documentoIdentidad, 
                fechaNacimiento=:fechaNacimiento,
                sexo=:sexo,
                correo=:correo,
                numeroContacto=:numeroContacto,
                direccion=:direccion,
                usuario=:usuario,
                rol=:rol,
                contrasena=:contrasena, 
                estado=:estado, 
                update_at= NOW() 
                where idPersona= :idPersona
                ');
        
            //vinculmamos los valores
            $this->db->bind(' :idPersona',  $datos['idPersona']);
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
            $this->db->bind(' :usuario'         ,  $datos['usuario']);
            $this->db->bind(' :rol'             ,  $datos['rol']);
            $this->db->bind(' :contrasena'      ,  $datos['contrasena']);
            $this->db->bind(' :estado'          ,  $datos['estado']);

            if ($this->db->execute()){           
                return true;
            }else{
                return false;
            }

        }

        public function CredencialesCorrectas($usuario, $contrasena){
            $this->db->query( 'SELECT count(1) as existe FROM personas where usuario=:usuario and contrasena=:contrasena');
            $this->db->bind(':usuario',$usuario);
            $this->db->bind(':contrasena',$contrasena);
            $fila=$this->db->registro();
            return $fila->existe==1;
        }

        public function ObtenerDatosPorNombreUsuario($usuario){
            $this->db->query( 'SELECT * FROM personas where usuario=:usuario');
            $this->db->bind(':usuario',$usuario);
            $fila=$this->db->registro();
            return $fila;
        }
        #-----------------------------------------------------------------------------------
    }
       
 ?>