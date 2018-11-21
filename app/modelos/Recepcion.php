<?php
/**
* 
*/
class Recepcion extends Base
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function agregarNueva($datos){
		/* obtener numero de factura: pendiente
		$this->db->query("SELECT documentoIdentidad existe from personas where documentoIdentidad = :documentoIdentidad and tipoPersona = 'cliente'");            
		 $this->db->bind(':documentoIdentidad',$datos['documentoIdentidad']);
		 $existe=$this->db->execute();
		 $existe=$this->db->contarFilas();

		 if($existe>0)
		 {
		  // -2 significa que el cliente ya existe (numero de identificacion ya registrado)
		  return -2;       
		 }  */  
		 $this->db->query("INSERT INTO recepciones (
							  idcliente, numeroFactura, idFinca, Estado, created_at,created_by, correo, direccion, temperatura) 
							  VALUES (
							  :idcliente,:numeroFactura, :idFinca, 'Activo', 
							  NOW(),:created_by, :correo, :direccion, :temperatura)
						  ");

		 //VINCULAR LOS VALORES --- BIND(sentencias preparadas)---
		 $this->db->bind(':idcliente'    ,  $datos['idCliente']);
		 $this->db->bind(':numeroFactura'   ,  0 ); // mientras se define 
		 $this->db->bind(':idFinca'  ,  $datos['idDetalleFinca']);
		 $this->db->bind(':created_by', $_SESSION['idUsuario']);
		 $this->db->bind(':correo'  ,  $datos['correo']);
		 $this->db->bind(':direccion'  ,  $datos['direccion']);
		 $this->db->bind(':temperatura'  ,  $datos['Temperatura']);

		//EJECUTAMOS LA CONSULTA ----Execute

		 if ($this->db->execute()){           
		   //consulta ultimo id
		   $idRecepcion = $this->db->obtenerUltimoId();
		   //retorna ultimo id
		   return $idRecepcion; 
		 }
		 else{
		  // -1 significa que fallo el insert
		  return -1;
		 }      

	  }

        //se usa cuando el cliente esta mal creado y se necesita deshacer los datos guardados
        public function eliminarRecepcionNumero($numero){
            $this->db->query( "delete FROM recepciones where numeroRecibo=:numeroRecibo");
            $this->db->bind(':numeroRecibo',$numero);
            return $this->db->execute();
            
        }

        //limitar las recepciones para la paginación y mostrar en el index
        public function limit_recepciones($iniciar,$recepciones_x_pagina){

        $this->db->query(" SELECT * from recepciones WHERE numeroRecibo=numeroRecibo  ORDER BY created_at DESC LIMIT :iniciar,:nusuarios");
        $this->db->bind(':iniciar',$iniciar,PDO::PARAM_INT);
        $this->db->bind(':nusuarios',$recepciones_x_pagina,PDO::PARAM_INT);
            $listaRecepciones=$this->db->registros();
           return $listaRecepciones;

        }

        public function contar_recepciones(){
        	$this->db->query("SELECT count(*) as cuenta FROM recepciones");
            return $this->db->registro(); 
        }
	
}
?>