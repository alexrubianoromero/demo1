<?php
date_default_timezone_set('America/Bogota');
$raiz1= $_SERVER['DOCUMENT_ROOT'];
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz1.'/fpdf/fpdf.php');
require_once($raiz.'/valotablapc.php');
require_once($raiz.'/cotizaciones/modelo/cotizacionesModelo.php');
require_once($raiz.'/peritajes/modelo/PeritajesModelo.php');
require_once($raiz.'/funciones/funciones.class.php');
$modelo = new peritajesModelo();
$modeloCoti = new cotizacionesModelo();
$cotizacion = $modeloCoti->traerCotizacionId($conexion,$_REQUEST['id']);
$items = $modeloCoti->traerItemsCotizacionId($conexion,$_REQUEST['id']);
$carro = $modelo->buscarPlaca($conexion,$cotizacion[0]['placa']);
$cliente = $modelo->buscarCliente0Id($conexion,$carro['datos'][0]['propietario']);
$empresa = $modelo->traerEmpresa($conexion);
$nombre_empresa = $empresa['razon_social']; 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180,10,$nombre_empresa,0,0,'C');
$pdf->SetY(25);
$pdf->SetFont('Arial','',12);
$pdf->Cell(180,10,'COTIZACION  NO '.$_REQUEST['id'],1,1,'C');
$pdf->Cell(40,10,'Propietario ',1,0,'L');
$pdf->Cell(50,10,$cliente['datos'][0]['nombre'],1,0,'L');
$pdf->Cell(40,10,'',1,0,'L');
$pdf->Cell(50,10,'',1,1,'L');
$pdf->Cell(40,10,'Marca ',1,0,'L');
$pdf->Cell(50,10,$carro['datos'][0]['marca'],1,0,'L');
$pdf->Cell(40,10,'Modelo',1,0,'L');
$pdf->Cell(50,10,$carro['datos'][0]['modelo'],1,1,'L');
$pdf->Cell(40,10,'Color ',1,0,'L');
$pdf->Cell(50,10,$carro['datos'][0]['color'],1,0,'L');
$pdf->Cell(40,10,'Placa',1,0,'L');
$pdf->Cell(50,10,$carro['datos'][0]['placa'],1,1,'L');
$pdf->Cell(40,10,'VenciSoat ',1,0,'L');
$pdf->Cell(50,10,$carro['datos'][0]['vencisoat'],1,0,'L');
$pdf->Cell(40,10,'Ref',1,0,'L');
$pdf->Cell(50,10,'',1,1,'L');
$pdf->Cell(180,10,'OBSERVACIONES',1,1,'C');
$pdf->Cell(180,40,$peritaje[0]['observ'],1,1,'C');

$pdf->Cell(180,10,'ITEMS COTIZACION',1,1,'C');
$pdf->Cell(36,10,'COD',1,0,'C');
$pdf->Cell(36,10,'DESCRIP',1,0,'C');
$pdf->Cell(36,10,'V.UNIT',1,0,'C');
$pdf->Cell(36,10,'CAN',1,0,'C');
$pdf->Cell(36,10,'TOTAL',1,1,'C');
$totalCotizacion=0;
if($items['filas']>0)
{
    foreach($items['datos'] as $item)
    {
        $pdf->Cell(36,10,$item['codigo'],1,0,'C');
        $pdf->Cell(36,10,$item['descripcion'],1,0,'C');
        $pdf->Cell(36,10,number_format($item['valor_unitario'], 0, ',', '.'),1,0,'C');
        $pdf->Cell(36,10,$item['cantidad'],1,0,'C');
        $pdf->Cell(36,10,number_format($item['total_item'], 0, ',', '.'),1,1,'C');
        $totalCotizacion+= $item['total_item'];
    }
}
$pdf->Cell(36,10,'',1,0,'C');
$pdf->Cell(36,10,'',1,0,'C');
$pdf->Cell(36,10,'',1,0,'C');
$pdf->Cell(36,10,'TOTAL',1,0,'C');
$pdf->Cell(36,10,number_format($totalCotizacion, 0, ',', '.'),1,1,'C');

// $pdf->Cell(90,10,'ELABORO',1,0,'L');
// $pdf->Cell(90,10,'APROBO',1,1,'L');
$pdf->Output();
?>