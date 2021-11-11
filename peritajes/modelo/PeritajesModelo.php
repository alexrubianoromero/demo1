<?php
require_once('../valotablapc.php');
class PeritajesModelo{

    public function __construct()
    {
        echo $tabla3; 
    }
    public function traerPeritajes($conexion){
        $sql= "select idperitaje as Peritaje, idcarro, fecha from peritajes ";
        $consulta = mysql_query($sql,$conexion); 
        return $this->get_table_assoc($consulta);
     
    }
    public function get_table_assoc($datos)
		{
		 				$arreglo_assoc='';
							$i=0;	
							while($row = mysql_fetch_assoc($datos)){		
								$arreglo_assoc[$i] = $row;
								$i++;
							}
						return $arreglo_assoc;
		}

    public function buscarPlaca($conexion,$placa){
        $sql = "select * from carros where placa = '".$placa ."'  ";
        $consulta = mysql_query($sql,$conexion); 
        $filas = mysql_num_rows($consulta);
        $datos = $this->get_table_assoc($consulta);
        $respuesta['filas']= $filas;
        $respuesta['datos']=  $datos;  
        return $respuesta; 
    }    
    public function buscarCliente0Id($conexion,$id){
        $sql="select * from cliente0 where idcliente = '".$id."'  "; 
        // echo '<br>'.$sql;
        // die();
        $consulta = mysql_query($sql,$conexion); 
        $filas = mysql_num_rows($consulta);
        $datos = $this->get_table_assoc($consulta);
        $respuesta['filas']= $filas;
        $respuesta['datos']=  $datos;  
        return $respuesta; 
    }
    
}


?>