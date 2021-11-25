<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/funciones/funciones.class.php');

class cotizacionesModelo{
    public function __construct()
    {
        // echo $tabla3; 
    }
    public function traerCotizaciones($conexion){
        $sql= "SELECT p.idcotizacion as id, c.placa, 
        DATE_FORMAT(p.fecha,'%Y/%m/%d') as fecha , p.observaciones as observ
               FROM  cotizaciones p
               INNER JOIN  carros c ON c.idcarro = p.idcarro
               ORDER BY  idcotizacion DESC";
            //    echo '<br>'.$sql;
            //    die();
        $consulta = mysql_query($sql,$conexion); 
        $arr['filas'] = mysql_num_rows($consulta);
        $arr['datos'] = funciones::table_assoc($consulta);
        return $arr;
    }

    public function traerCotizacionId($conexion,$id){
        $sql= "SELECT p.idcotizacion as id, c.placa, p.fecha
               FROM  cotizaciones p
               INNER JOIN  carros c ON c.idcarro = p.idcarro
               WHERE p.idcotizacion = ".$id."
               ORDER BY  idcotizacion DESC";
            //    echo '<br>'.$sql;
            //    die();
        $consulta = mysql_query($sql,$conexion); 
        $arr = funciones::table_assoc($consulta);
        return $arr;
    }
    public function grabarCotizacion($conexion,$request){
        $sql = "INSERT INTO cotizaciones  (idcarro,fecha,observaciones)
                VALUES (
                '".$request['idcarro']."' 
                ,now() 
                ,'".$request['observaciones']."'
                )
        ";
        // echo '<br>'.$sql;
        // die(); 
        $consulta = mysql_query($sql,$conexion); 
       $id = $this->traerMaxIdCotizaciones($conexion);
       return $id;
    }
    public function traerMaxIdCotizaciones($conexion){
        $sql = "SELECT MAX(idcotizacion) as id FROM cotizaciones ";
        $consulta = mysql_query($sql,$conexion); 
        $arr = funciones::table_assoc($consulta);
        // echo 'los items<pre>';
        //     print_r($arr);
        //     echo '</pre>';
        //     die(); 
        $id= $arr[0]['id'];
        // echo 'maxid'.$id;
        // die();
        return $id;
    }
    public function grabarItemsCotizacionDefinitiva($conexion,$placa,$idCoti){
        $items = $this->traerItemsTemporal($conexion,$placa); 
        $items = $items['datos'];
            // echo 'los items<pre>';
            // print_r($items);
            // echo '</pre>';
            // die(); 
        foreach ($items as $item)
        {
            $sql = "INSERT INTO item_cotizacion 
            (no_factura, codigo,descripcion, valor_unitario, cantidad, total_item )
            VALUES ('".$idCoti."','".$item['codigo']."','".$item['descripcion']."'
            ,'".$item['valor_unitario']."' ,'".$item['cantidad']."' ,'".$item['total_item']."' 
            )";
            $consulta = mysql_query($sql,$conexion);  
        }

    }
    public function adicionarItemTemporal($conexion,$request){
        $sql = "INSERT INTO item_temporal  (no_factura, codigo , descripcion, cantidad,valor_unitario, 
                            total_item )   
                VALUES ('".$request['placa']."','".$request['codigo']."','".$request['descripcion']."'
                        ,'".$request['cantidad']."','".$request['vunitarioItem']."','".$request['vtotalItem']."'
                        ) ";    
                        // echo $sql;
                        // die();    
                        $consulta = mysql_query($sql,$conexion);     
    }
                    
    public function traerItemsTemporal($conexion,$placa){
        $sql = "SELECT * FROM  item_temporal  WHERE no_factura = '".$placa."' 
                 ORDER BY id_item ";
                //  echo $sql;
                //  die();
        $consulta = mysql_query($sql,$conexion); 
        $filas = mysql_num_rows($consulta);
        $arr['datos'] = funciones::table_assoc($consulta);
        $arr['filas'] = $filas; 
        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';
        // die();
        return $arr; 
                
    }
    public function traerItemsCotizacionId($conexion,$id){
        $sql = "SELECT * FROM  item_cotizacion  WHERE no_factura = '".$id."' 
                 ORDER BY id_item ";
                //  echo $sql;
                //  die();
        $consulta = mysql_query($sql,$conexion); 
        $filas = mysql_num_rows($consulta);
        $arr['datos'] = funciones::table_assoc($consulta);
        $arr['filas'] = $filas; 
        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';
        // die();
        return $arr; 
                
    }

    public function eliminarItemTemporal($conexion,$id_item){
        $sql = "DELETE FROM item_temporal  WHERE id_item = '".$id_item."' ";
        $consulta = mysql_query($sql,$conexion); 
    }
    public function eliminarItemsTemporalPlaca($conexion,$placa){
              $sql = "DELETE FROM item_temporal  WHERE no_factura = '".$placa."'   ";
              $consulta = mysql_query($sql,$conexion); 
    }
}
                
                
                
?>