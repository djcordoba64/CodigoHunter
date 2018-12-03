<?php
/**
 * 
 */
class Estabilizacion 
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	//Modificar el nombre de la tabla datosestabilizacion(tiene un atilde)
	public function crear($datos,$idcafe){
		$this->db->query( "SELECT * FROM datosestabilizacion where idcafe=2 and iddatosEstabilizacion =(select max(iddatosEstabilizacion) from datosestabilizacion where idcafe=1)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       if($fila!==true){
       	//preparamos la consulata
		$this->db->query('INSERT INTO datosestabilizacion  (fechaHora,idCafe,estabilizacion,observacion,created_by) 
		VALUES (NOW(),:idcafe,:estabilizacion,:observacion,:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':estabilizacion', $datos['estabilizacion']);	
			 $this->db->bind(':observacion', $datos['observacion']);			 		
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);

			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return 0;
           	}else{
            	return -1;
           }

       }else{

       	  return 1;//EL id ya existe.
       }		
	}
}
?>