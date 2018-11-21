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
        $this->db->query( "SELECT count(1) as existe FROM estadostorrefaccion where idcafe=:idcafe " );
        $this->db->bind(':idcafe',$datos['idcafe']);
        $existe=$this->db->registro();
       	$existe=$this->db->contarFilas();           

        if( $existe>0){
            	return 1; // existe
        }else{
        	 return 0; // no existe
        }
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
		$this->db->query ("SELECT e.codigoEstado, e.idcafe, c.codigoCafe FROM estadostorrefaccion as e LEFT join cafes as c on c.idcafe= e.idcafe where codigoCafe=:codigoCafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion)");
		 $this->db->bind(':codigoCafe',$datos['codigoCafe']);
            $fila=$this->db->registro();
           	return $fila;
           
	}


}



?>