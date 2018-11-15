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

	public function consultar_ultimo_estado($datos){
		$this->db->query ("SELECT e.codigoEstado, e.idcafe, c.codigoCafe FROM estadostorrefaccion as e LEFT join cafes as c on c.idcafe= e.idcafe where codigoCafe=:codigoCafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion)");
		 $this->db->bind(':codigoCafe',$datos['codigoCafe']);
            $fila=$this->db->registro();
           	return $fila;
           
	}


}



?>