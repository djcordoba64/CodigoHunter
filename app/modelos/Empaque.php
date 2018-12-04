<?php
/**
 * 
 */
class Empaque 
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function crear($datos,$idcafe){
		$this->db->query( "SELECT * FROM datosempaque where idcafe=:idcafe and iddatosEmpaque =(select max(iddatosEmpaque) from datosempaque where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       if($fila!==true){
       	//preparamos la consulata
		$this->db->query('INSERT INTO datosempaque  (fechaHora,idCafe,empaque,observacion,created_by) 
		VALUES (NOW(),:idcafe,:empaque,:observacion,:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':empaque', $datos['empaque']);	
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
		$this->db->query("SELECT c.codigoCafe, d.iddatosEmpaque,d.fechaHora,d.idcafe,d.empaque,d.observacion from datosempaque as d INNER JOIN cafes as c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}

	public function actualizarDatos($datos){
		$this->db->query('UPDATE datosempaque SET 
			empaque=:empaque,
			observacion=:observacion,
			updated_at= NOW(),
			updated_by = :updated_by 
            where iddatosEmpaque=:iddatosEmpaque');

            $this->db->bind(':empaque',  $datos['empaque']);
            $this->db->bind(':observacion',  $datos['observacion']);           
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);
			$this->db->bind(':iddatosEmpaque',  $datos['iddatosEmpaque']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }
	}
}
?>