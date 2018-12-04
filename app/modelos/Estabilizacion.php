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
		$this->db->query( "SELECT * FROM datosestabilización where idcafe=:idcafe and iddatosEstabilizacion =(select max(iddatosEstabilizacion) from datosestabilización where idcafe=idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       if($fila!==true){
       	//preparamos la consulata
		$this->db->query('INSERT INTO datosestabilización  (fechaHora,idCafe,estabilizacion,observacion,created_by) 
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

	public function obtenerDatos_x_id($idcafe){
		$this->db->query("SELECT c.codigoCafe, d.iddatosEstabilizacion,d.fechaHora,d.idcafe,d.estabilizacion,d.observacion from datosestabilización  as d INNER JOIN cafes as c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}

	public function actualizarDatos($datos){
		$this->db->query('UPDATE datosestabilización SET 
			estabilizacion=:estabilizacion,
			observacion=:observacion,
			updated_at= NOW(),
			updated_by = :updated_by 
            where iddatosEstabilizacion=:iddatosEstabilizacion');

            $this->db->bind(':estabilizacion',  $datos['estabilizacion']);
            $this->db->bind(':observacion',  $datos['observacion']);           
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);
			$this->db->bind(':iddatosEstabilizacion',  $datos['iddatosEstabilizacion']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }
	}
}
?>