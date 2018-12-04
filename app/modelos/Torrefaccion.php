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
		$this->db->query ("SELECT * FROM cafes as c inner join estadostorrefaccion as e on e.idcafe=e.idcafe where c.idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=c.idcafe)");
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
		$this->db->query ("SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)");
		 $this->db->bind(':idcafe',$datos['idcafe']);
      $listaUsuarios=$this->db->registros();
      return $listaUsuarios;
           
	}


  //agregar los campos a la BD created_at,created_by
  public function insertarEstado($idcafe, $codigoSiguiente){
    $this->db->query( "SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       //var_dump($fila);
      if($fila->codigoEstado!==$codigoSiguiente){
          
        //preparamos la consulata
        $this->db->query('INSERT INTO estadostorrefaccion (idCafe,fechaHora,codigoEstado,created_by) 
           VALUES (:idcafe,NOW(),:codigoEstado,:created_by)
           ');
    
           //vinculamos los valores
          $this->db->bind(':idcafe',$idcafe);   
          $this->db->bind(':codigoEstado',$codigoSiguiente); 
          $this->db->bind(':created_by', $_SESSION['idUsuario']);
           
           //Ejecutamos la consulta
          if ($this->db->execute()){           
                  return 1;//SE HIZO EL INSERT
          }else{
                  return 0; //no SE HIZO ELINSERT
          }
      }else{
        return 1;//EL COGIGO YA SE REGISTRO.
      }
  }


  public function insertarEstado_detenido($idcafe, $codigoDetener){
    $this->db->query( "SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       //var_dump($fila);
      if($fila->codigoEstado!==$codigoDetener){
         $this->db->query('INSERT INTO estadostorrefaccion (idCafe,fechaHora,codigoEstado,created_at,created_by) 
           VALUES (:idcafe,NOW(),:codigoEstado,NOW(),:created_by)
           ');
    
           //vinculamos los valores
          $this->db->bind(':idcafe',$idcafe);   
          $this->db->bind(':codigoEstado',$codigoDetener);  
          $this->db->bind(':created_by', $_SESSION['idUsuario']);
           
           //Ejecutamos la consulta
          if ($this->db->execute()){           
                  return 1;//SE HIZO EL INSERT
          }else{
                  return 0; //no SE HIZO ELINSERT
          }
      }else{
         return 1;//EL COGIGO YA SE REGISTRO.
      }  
   
  }


  public function insertarEstado_reanudado($idcafe, $codigoReanudar){
    $this->db->query( "SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

        if($fila->codigoEstado!==$codigoReanudar){
           $this->db->query('INSERT INTO estadostorrefaccion (idCafe,fechaHora,codigoEstado,created_at,created_by) 
           VALUES (:idcafe,NOW(),:codigoEstado,NOW(),:created_by)
           ');
    
           //vinculamos los valores
          $this->db->bind(':idcafe',$idcafe);   
          $this->db->bind(':codigoEstado',$codigoReanudar);  
          $this->db->bind(':created_by', $_SESSION['idUsuario']);
           
           //Ejecutamos la consulta
          if ($this->db->execute()){           
                  return 1;//SE HIZO EL INSERT
          }else{
                  return 0; //no SE HIZO ELINSERT
          }
        }else{
          return 1;//EL COGIGO YA SE REGISTRO
        }

   
  }


  public function insertar_finalizarEstado($idcafe, $codigoFinalizar){
    $this->db->query( "SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

        if($fila->codigoEstado!==$codigoFinalizar){
          $this->db->query('INSERT INTO estadostorrefaccion (idCafe,fechaHora,codigoEstado,created_at,created_by) 
           VALUES (:idcafe,NOW(),:codigoEstado,NOW(),:created_by)
           ');
    
           //vinculamos los valores
          $this->db->bind(':idcafe',$idcafe);   
          $this->db->bind(':codigoEstado',$codigoFinalizar);  
          $this->db->bind(':created_by', $_SESSION['idUsuario']);
           
           //Ejecutamos la consulta
          if ($this->db->execute()){           
                  return 1;//SE HIZO EL INSERT
          }else{
                  return 0; //no SE HIZO ELINSERT
          }
      }else{
        return 1;//EL COGIGO YA SE REGISTRO
      }

  }

  public function insertar_procesoTorrefaccionfinalizado($datos){
    $this->db->query( "SELECT * FROM estadostorrefaccion where idcafe=:idcafe and idestadosTorrefaccion =(select max(idestadosTorrefaccion) from estadostorrefaccion where idcafe=:idcafe)" );
    $this->db->bind(':idcafe',$datos['idcafe']);     
      $fila=$this->db->registro();

    if($fila->codigoEstado!==$datos['codigoFinalizar']){

      $this->db->query('INSERT INTO estadostorrefaccion (idCafe,fechaHora,codigoEstado,observacion,mermaTueste,created_by) 
        VALUES (:idcafe,NOW(),:codigoEstado,:observacion,:mermaTueste,:created_by)
       ');
        
         //vinculamos los valores
        $this->db->bind(':idcafe',$datos['idcafe']);   
        $this->db->bind(':codigoEstado',$datos['codigoFinalizar']);
        $this->db->bind(':observacion',$datos['observacion']);
        $this->db->bind(':mermaTueste',$datos['mermaTueste']);   
        $this->db->bind(':created_by', $_SESSION['idUsuario']);
             
        //Ejecutamos la consulta
        if ($this->db->execute()){           
          return 1;  //SE HIZO EL INSERT
       }else{
           return 0; //no SE HIZO ELINSERT
        }
     }else{
      return 1;//EL COGIGO YA SE REGISTRO
     } 
  }

//------------INDEX----------------------------------------------------
  public function obtenerEstadosLimit($iniciar,$Estados_x_pagina){
        //Hacemos la consulta para obtener todos lo usuarios registrados.
        $this->db->query("SELECT e.fechaHora,e.codigoEstado,c.codigoCafe,p.primerNombre,p.segundoApellido,p.documentoIdentidad  FROM estadostorrefaccion as e inner join cafes as c on c.idcafe=e.idcafe inner join personas as p on e.created_by=p.idPersona ORDER BY e.fechaHora desc LIMIT :iniciar,:nestados");
        $this->db->bind(':iniciar',$iniciar,PDO::PARAM_INT);
        $this->db->bind(':nestados',$Estados_x_pagina,PDO::PARAM_INT);
            $listaEStados=$this->db->registros();
           return $listaEStados;
      }

  public function contarEstados(){
    $this->db->query("SELECT count(*) as cuenta FROM estadostorrefaccion as e where e.codigoEstado LIKE 'GT%'");
     return $this->db->registro();                
  }

}



?>