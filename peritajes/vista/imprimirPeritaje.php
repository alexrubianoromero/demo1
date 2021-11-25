<?php
require_once('../../valotablapc.php');
require_once('../../peritajes/modelo/PeritajesModelo.php');
require_once('../../funciones/funciones.class.php');
$modelo = new PeritajesModelo();
$peritaje = $modelo->traerPeritajeId($conexion,$_REQUEST['id']);
$carro = $modelo->buscarPlaca($conexion,$peritaje[0]['placa']);
$cliente = $modelo->buscarCliente0Id($conexion,$carro['datos'][0]['propietario']);
$empresa = $modelo->traerEmpresa($conexion);
// echo '<pre>';
//        print_r($empresa);
//        echo '</pre>';
?>
<!DOCTYPE html>
<html lang="es"  class"no-js">
<head>
	<meta charset="UTF-8">
	<title>Imprimir Peritaje </title>
    <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/style.css">
  <!-- <link rel="stylesheet" href="../css/styleprueba.css"> -->
    <title>Document</title>
    <style>
/*
.pruebita123{
    color : red ; 
    font-size: 50PX;
}
*/
.impresion{
    font-size: 12px;
}
#tituloPeritaje{
    font-size: 30px;     
}
#titulo2{
    font-size: 15px;
}
    </style>
</head>
<body align="center">
<div align="center" id="impresion">
    <p id="tituloPeritaje" ><?php echo $empresa['razon_social']  ?></p>
 <table border="1" width="80%"  class="table impresion">
    <tr>
        <td align="center" colspan="4"><p id="titulo2">PERITAJE MOTOCICLETA No <?php echo $peritaje[0]['id']  ?> </p></td>
    </tr>
     <tr>
         <td width="20%"><label>PROPIETARIO</label></td>
         <td width="30%"><?php  echo  strtoupper($cliente['datos'][0]['nombre'])  ?></td>
         <td width="20%"></td>
         <td width="30%"></td>
     </tr>
     <tr>
         <td> <span>MARCA</span>   </td>
         <td><?php  echo  $carro['datos'][0]['marca']  ?>
         <td>MODELO</td>
         <td><?php  echo  $carro['datos'][0]['modelo']  ?>
     </tr>
     <tr>
         <td>COLOR</td>
         <td><?php  echo  $carro['datos'][0]['color']  ?>
         <td><label>PLACAS</td>
         <td><?php  echo  $carro['datos'][0]['placa']  ?>
     </tr>
     <tr>
         <td>VENCISOAT</td>
         <td><?php  echo  $carro['datos'][0]['vencisoat']  ?>
         <td>REF</td>
         <td></td>
     </tr>
     <tr>
         <td>AMORTIGUADORES</td>
         <td><?php echo $peritaje[0]['amortiguadores']  ?></td>
         <td>KILOMETRAJE</td>
         <td><?php echo $peritaje[0]['klm']  ?></td>
     </tr>
     <tr>
         <td>EXOSTO</td>
         <td><?php echo $peritaje[0]['exosto']  ?></td>
         <td>FRENOS</td>
         <td><?php echo $peritaje[0]['frenos']  ?></td>
     </tr>
     <tr>
         <td>KIT DE ARRASTRE</td>
         <td><?php echo $peritaje[0]['arrastre']  ?></td>
         <td>LUCES</td>
         <td><?php echo $peritaje[0]['luces']  ?></td>
     </tr>
     <tr>
         <td>LLANTAS</td>
         <td><?php echo $peritaje[0]['llantas']  ?></td>
         <td>MOTOR</td>
         <td><?php echo $peritaje[0]['motor']  ?></td>
     </tr>
     <tr>
         <td>SILLIN</td>
         <td><?php echo $peritaje[0]['sillin']  ?></td>
         <td><label><ACOMETRO</td>
         <td><?php echo $peritaje[0]['tacometro']  ?></td>
     </tr>
     <tr>
         <td>VELOCIMETRO</td>
         <td><?php echo $peritaje[0]['velocimetro']  ?></td>
         <td></td>
         <td></td>
     </tr>
 <!-- </table>
 <table border="1" width="80%" class="impresion"> -->
     <tr >
         <td colspan="4" align="center"><label>OBSERVACIONES</label></td>
     </tr>
     <tr>
         <td colspan="4"><?php echo $peritaje[0]['observ']   ?></td>
     </tr>
 <!-- </table>
 <table border="1" width="80%" class="impresion"> -->
     <tr>
         <td colspan="2" align="left">ELABORO<br><br><br></td>
         <td colspan="2"align="left">APROBO<br><br><br></td>
     </tr>
 </table>
 </div>
</body>
</html>