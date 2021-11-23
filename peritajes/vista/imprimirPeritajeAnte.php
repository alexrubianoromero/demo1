<?php
require_once('../../valotablapc.php');
require_once('../../peritajes/modelo/PeritajesModelo.php');
require_once('../../funciones/funciones.class.php');
$modelo = new PeritajesModelo();
$peritaje = $modelo->traerPeritajeId($conexion,$_REQUEST['id']);
$carro = $modelo->buscarPlaca($conexion,$peritaje[0]['placa']);
$cliente = $modelo->buscarCliente0Id($conexion,$carro['datos'][0]['propietario']);

// echo '<pre>';
//        print_r($peritaje);
//        echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- <link rel="stylesheet" href="../css/styleprueba.css"> -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- <link rel="stylesheet" href="../../css/bootstrap.min.css">  -->
    <title>Document</title>
    <style>
/*
.pruebita123{
    color : red ; 
    font-size: 50PX;
}
*/
    </style>
</head>
<body align="center">
<div align="center" id="impresion">
    <div class = "pruebita123" >PRUEBA DE CLASE </div>
    <P id="tituloPeritaje" >MOTOREVOLUCIONES</P>
 <table border="1" width="80%" class="table" >
     <tr>
         <td align="center">PERITAJE MOTOCICLETA No <?php echo $peritaje[0]['id']  ?></td>
     </tr>
 </table>
 <table border="1" width="80%" class="table">
     <tr>
         <td><label>PROPIETARIO</td>
         <td colspan="3"><?php  echo  strtoupper($cliente['datos'][0]['nombre'])  ?></td>
     </tr>
     <tr>
         <td>MARCA</td>
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
 </table>
 <table border="1" width="80%" class="table">
     <tr>
         <td align="center"><label>OBSERVACIONES</label></td>
     </tr>
     <tr>
         <td><?php echo $peritaje[0]['observ']   ?></td>
     </tr>
 </table>
 <table border="1" width="80%" class="table">
     <tr>
         <td align="left">ELABORO<br><br><br></td>
         <td align="left">APROBO</td>
     </tr>
 </table>
 </div>
</body>
</html>