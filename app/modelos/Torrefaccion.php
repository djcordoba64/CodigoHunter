<?php
/**
* 
*/
class Torrefaccion
{
	
	function __construct()
	{
		$this->db = new Base;
	}


	//Validar si esta registrado el codigo del café
	public function existeCafe_en_estados($datos){
        $this->db->query( "SELECT idcafe as existe FROM estadostorrefaccion where idcafe=:idcafe " );
        $this->db->bind(':idcafe',$datos['idcafe']);
       $fila=$this->db->registro();
        $fila=$this->db->contarFilas();
       if($fila>0){
       		return 1;
       }else{
       	return 0;
       }
           
     }
   
    public function consultar_idEstados($datos){
		$this->db->query ("SELECT * FROM cafes as c LEFT join estadostorrefaccion as e on e.idcafe=e.idcafe where c.idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion)");
		 $this->db->bind(':idcafe',$datos['idcafe']);
        $idEstados=$this->db->registro();
     		return $idEstados;
           
	}


	//consultar el estado.
	public function validar_ExisteEstado($datos){

		$this->db->query( 'SELECT codigoCafe as existeEstado FROM estadostorrefaccion as e
							LEFT join cafes as c on c.idcafe= e.idcafe where codigoCafe=:codigoCafe' );
        $this->db->bind(':codigoCafe',$datos['codigoCafe']);
        $existeEstado=$this->db->registro();
        $existeEstado=$this->db->contarFilas();           

        if( $existeEstado>0){
            	return true;// Tiene algun estado
        }else{
        	 return false;// No tiene estados
        }
	}

	public function consultar_ultimo_proceso($datos){
		$this->db->query ("SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion)");
		 $this->db->bind(':codigoCafe',$datos['idcafe']);
            $fila=$this->db->registro();
           	return $fila;
           
	}


}



?>