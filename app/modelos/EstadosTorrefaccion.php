<?php
/**
* 
*/
class EstadosTorrefaccion
{
	
	function __construct()
	{
		$this->db = new Base;
	}



	//consultar el estado.
	public function consultarEstado($idcafe){

		 $this->db->query( 'SELECT count(1) as existe FROM estadostorrefacion where idcafe=:idcafe ');
            $this->db->bind(':documentoIdentidad',$identificacion);
            $this->db->bind(':contrasena',$contrasena);
            $cantidad_procesos=$this->db->execute();
            $cantidad_procesos=$this->db->contarFilas();
            
            //Se va ha iniciar el proceso de torrefaccion (es primera vez).
            if( $cantidad_procesos==0){
            	return 0;
            }


	}
}



?>