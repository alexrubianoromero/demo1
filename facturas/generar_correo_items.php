<?php

echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
die();
include('../valotablapc.php');

$sqlFacturaTraeIdOrden = "select * from $tabla11 where id_factura = '".$_REQUEST['id_factura']."' "; 
$consultaIdOrden = mysql_query($sqlFacturaTraeIdOrden,$conexion);
$arregloIdOrden = mysql_fetch_assoc($consultaIdOrden);
$idOrden = $arregloIdOrden['id_orden'];
$noFactura = $arregloIdOrden['numero_factura'];
$placa = $arregloIdOrden['placa'];
// echo '<br>'.$idOrden;
// die();

$sql_correo = "select cli.email as email from $tabla14 o
inner join $tabla4 c on (c.placa = o.placa)
inner join $tabla3 cli on (cli.idcliente=c.propietario)
where o.id = '".$_REQUEST['idorden']."'
";
$consulta_email= mysql_query($sql_correo,$conexion);
$arreglo_email = mysql_fetch_assoc($consulta_email);
$email = $arreglo_email['email'];
// echo  '<br>'.$email;
// die();
$sql_items= "select * from $tabla15 where no_factura =   '".$_REQUEST['idorden']."'  ";

//echo '<br>'.$sql_items;
$consulta_items = mysql_query($sql_items);
$texto_items ='';
$suma_items = '0';
while($items = mysql_fetch_assoc($consulta_items))
{	
 $texto_items = $texto_items.'*'.$items['descripcion'];
 $suma_items += $items['total_item'];
 //echo '<br>'.$items['descripcion'];
}
//echo '<br>'.$texto_items;
//echo '<br>'.$suma_items;

$body = 'KAYMO

Te informa el avance de tu orden de reparacion

Placa: '.$placa.'  Factura No: '.$noFactura.'

Puedes ver tu orden de reparacion en el siguiente link:

https://www.alexrubiano.com/demo1/factura/'.$_REQUEST['id_factura'].'


KAYMO. 
Taller KAYMO
3124551226 

O envianos un E-mail a ventas@alexrubiano.com 
Recuerda, estamos ubicados en la cll 26 con 73';

//echo '<br>'.$texto_items;

//echo '<br>body<br>'.$body.'<br>fin de body</br>';
//$body="prueba envio correo";
/*
$cuerpo_correo="crecion de orden";
*/
//////////////////////////////////////////////////////////////////	
/////////////////enviar el correo 
//mail($_REQUEST['email'],'MOTORCYCLE ROOM',$body,$headers); 
include('enviar_correo_items.php');

?>