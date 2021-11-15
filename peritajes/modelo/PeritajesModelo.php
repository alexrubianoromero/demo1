<?php
require_once('../valotablapc.php');
class PeritajesModelo{

    public function __construct()
    {
        echo $tabla3; 
    }

    public function traerPeritajes($conexion){
        $sql= "SELECT p.idperitaje as id, c.placa, p.fecha,p.kilometraje as klm,p.observaciones as observ 
        
               FROM  peritajes p
               INNER JOIN  carros c ON c.idcarro = p.idcarro
               ORDER BY  idperitaje DESC";
            //    echo '<br>'.$sql;
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
        // echo '<br>'.$sql;
        // die();
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
    
    public function grabarPeritaje($conexion,$request){
        $sql = "INSERT INTO peritajes  (idcarro,fecha,kilometraje,observaciones,amortiguadores
                ,exosto,arrastre, llantas,sillin,velocimetro, frenos,luces,motor,tacometro)
                VALUES (
                '".$request['idcarro']."', 
                now(), 
                '".$request['kilometraje']."' 
                ,'".$request['observaciones']."'
                ,'".$request['amortiguadores']."'
                ,'".$request['exosto']."'
                ,'".$request['arrastre']."'
                ,'".$request['llantas']."'
                ,'".$request['sillin']."'
                ,'".$request['velocimetro']."'
                ,'".$request['frenos']."'
                ,'".$request['luces']."'
                ,'".$request['motor']."'
                ,'".$request['tacometro']."'
                )
        ";
        // echo '<br>'.$sql;
        // die(); 
        $consulta = mysql_query($sql,$conexion); 
    }

      public function traerPeritajeId($conexion,$id){
        $sql= "SELECT p.idperitaje as id, c.placa, p.fecha,kilometraje as klm,p.observaciones as observ,
        p.amortiguadores,p.exosto, p.arrastre, p.llantas, p.sillin, p.velocimetro, p.frenos,p.luces
        ,p.motor, p.tacometro 
               FROM  peritajes p
               INNER JOIN  carros c ON c.idcarro = p.idcarro
               WHERE p.idperitaje = ".$id."
               ORDER BY  idperitaje DESC";
            //    echo '<br>'.$sql;
            //    die();
        $consulta = mysql_query($sql,$conexion); 
        return $this->get_table_assoc($consulta);
    }

}


?>