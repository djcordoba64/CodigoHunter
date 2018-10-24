:<?php 
      

    class Persona{
    	private $db;

    	public function __construct(){
    		$this->db = new Base;
    	}
        #------------------USUARIOS-----------------------------------------------------------------------        
        //Listamos todos lo usuarios registramos
    	public function obtenerUsuarios(){
    		$this->db->query("SELECT * FROM personas WHERE tipoPersona='usuario'");
            $listaUsuarios=$this->db->registros();
    		return $listaUsuarios;
    	}
        //Agregamos un nuevo usuario
        public function agregarUsuario($datos){

           $this->db->query('INSERT INTO personas (primerNombre,segundoNombre,primerApellido, segundoApellido, documentoIdentidad, 
                            fechaNacimiento,correo,numeroContacto,direccion,tipoPersona,usuario,rol,contrasena, 
                            estado, created_at) 
                            VALUES (:primerNombre,:segundoNombre,:primerApellido, :segundoApellido, :documentoIdentidad, 
                            :fechaNacimiento,:correo, :numeroContacto, :direccion, :tipoPersona, :usuario, :rol, :contrasena, 
                            :estado, NOW())');

           //VINCULAR LOS VALORES --- BIND---
           $this->db->bind(':primerNombre' , $datos['primerNombre']);
           $this->db->bind(':segundoNombre' , $datos['segundoNombre']);
           $this->db->bind(':primerApellido' , $datos['primerApellido']);
           $this->db->bind(':segundoApellido' , $datos['segundoApellido']);
           $this->db->bind(':documentoIdentidad' , $datos['documentoIdentidad']);
           $this->db->bind(':fechaNacimiento' , $datos['fechaNacimiento']);
           //$this->db->bind(':sexo' , $datos['sexo']);
           $this->db->bind(':correo' , $datos['correo']);
           $this->db->bind(':numeroContacto' , $datos['numeroContacto']);
           $this->db->bind(':direccion' , $datos['direccion']);
           $this->db->bind(':tipoPersona' , 'usuario');
           $this->db->bind(':usuario' , $datos['usuario']);
           $this->db->bind(':rol' , $datos['rol']);
           $this->db->bind(':contrasena' , $datos['contrasena']);
           $this->db->bind(':estado' , $datos['estado']);

           //EJECUTAMOS LA CONSULTA ----Excute

           if ($this->db->execute()){
            
            return true;
           // echo 'si';

           }else{
            return false;
            //echo 'no';
           }


        }

         #-------------------------------------------------------------------------------------------------
    }
       
 ?>