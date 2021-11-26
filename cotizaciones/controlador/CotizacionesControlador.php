<?php
require_once('vista/cotizacionesVista.php');
require_once('modelo/cotizacionesModelo.php');
require_once('../peritajes/vista/PeritajesVista.php');
require_once('../peritajes/modelo/PeritajesModelo.php');
require_once('../funciones/funciones.class.php');

class CotizacionesControlador{
    private $modelo;
    private $modeloPeritaje;
    private $vista;
    private $conexion;
    private $vistaPeritaje;

    
    public function __construct($conexion){
        $this->conexion = $conexion;
        $this->modelo = new cotizacionesModelo();
        $this->modeloPeritaje = new PeritajesModelo();
        $this->vista = new cotizacionesVista();
        $this->vistaPeritaje = new PeritajesVista();

        
        if(!isset($_REQUEST['opcion']) || $_REQUEST['opcion']=='consultar'){
            $this->pantallaInicial($this->conexion);
        }
        if($_REQUEST['opcion']=='consultaCotizacionId'){
            $this->consultaCotizacionId($this->conexion,$_REQUEST['id']);
        }
        if($_REQUEST['opcion']=='nuevo'){
            $this->vista->nuevaCotizacion();
        } 
        if($_REQUEST['opcion']=='buscarPlaca'){
            $this->buscarPlaca($this->conexion,$_REQUEST['placa']);
        } 
        if($_REQUEST['opcion']=='grabarCotizacion'){
            // echo '<pre>';
            // print_r($_REQUEST);
            // echo '</pre>';
            // die();  
            $this->grabarCotizacion($this->conexion,$_REQUEST);
        } 
        
        if($_REQUEST['opcion']=='pedirInfoItem'){
            $this->pedirInfoItem($this->conexion,$_REQUEST['placa']);
        } 
        if($_REQUEST['opcion']=='adicionarItem'){
            $this->adicionarItem($this->conexion,$_REQUEST);
        } 
        if($_REQUEST['opcion']=='eliminarItemTemporal'){
            $this->eliminarItemTemporal($this->conexion,$_REQUEST);
        } 
        if($_REQUEST['opcion']=='generarCorreoCotizacion'){
            $this->generarCorreoCotizacion($this->conexion,$_REQUEST['id']);
        }
        if($_REQUEST['opcion']=='grabarVehiculo1'){
            $this->grabarVehiculo($this->conexion,$_REQUEST);
        }
        if($_REQUEST['opcion']=='nuevoPropietario'){
            $this->nuevoPropietario($this->conexion);
        }
        if($_REQUEST['opcion']=='grabarPropietario'){
            $this->grabarPropietario($this->conexion,$_REQUEST);
        }
        if($_REQUEST['opcion']=='cargarUltimoPropietario'){
            $this->cargarUltimoPropietario($this->conexion);
        }

    }
    public function pantallaInicial($conexion){
        $cotizaciones = $this->modelo->traerCotizaciones($conexion);
            $this->vista->pantallaInicial($cotizaciones);
    }
    public function consultaCotizacionId($conexion,$id){
        $datosCotizacion =  $this->modelo->traerCotizacionId($conexion,$id);
        $datosPlaca = $this->modeloPeritaje->buscarPlaca($conexion,$datosCotizacion[0]['placa']);
        $datosCliente0 = $this->modeloPeritaje->buscarCliente0Id($conexion,$datosPlaca['datos'][0]['propietario']);
        $items =  $this->modelo->traerItemsCotizacionId($conexion,$id);
        $this->vista->pantallaDatosCotizacionId($datosCotizacion,$datosPlaca,$datosCliente0,$items);
    }
    public function buscarPlaca($conexion,$placa){
        $datosPlaca = $this->modeloPeritaje->buscarPlaca($conexion,$placa);
        if($datosPlaca['filas']>0){
            
            $this->modelo->eliminarItemsTemporalPlaca($conexion,$placa);
            $datosCliente0 = $this->modeloPeritaje->buscarCliente0Id($conexion,$datosPlaca['datos'][0]['propietario']);
            $this->vista->mostrarDatosPlaca($datosPlaca['datos'],$datosCliente0['datos']);
        }
        else{
            $propietarios = $this->modeloPeritaje->traerClientes0($conexion);
            $this->vistaPeritaje->preguntarDatosPlaca($placa,$propietarios);
        }
    }
    public function grabarCotizacion($conexion,$request){
        $maxId = $this->modelo->grabarCotizacion($conexion,$request);
        // echo $maxId;
        // die();
        $this->modelo->grabarItemsCotizacionDefinitiva($conexion,$request['placa'],$maxId);

        $this->modelo->eliminarItemsTemporalPlaca($conexion,$request['placa']);
        $this->pantallaInicial($conexion);
    }
    public function pedirInfoItem($conexion,$placa){
        $this->vista->preguntarItemTemporal($placa,$propietarios);
    }
    public function adicionarItem($conexion,$request){
        $this->modelo->adicionarItemTemporal($conexion,$request);
        $itemsTemporal = $this->modelo->traerItemsTemporal($conexion,$request['placa']);
        $this->vista->mostrarItemsTemporal($itemsTemporal);
    }
    
    public function eliminarItemTemporal($conexion,$request){
        $this->modelo->eliminarItemTemporal($conexion,$request['id_item']);
        $itemsTemporal = $this->modelo->traerItemsTemporal($conexion,$request['placa']);
        $this->vista->mostrarItemsTemporal($itemsTemporal);
    }


    public function generarCorreoCotizacion($conexion,$id){
        $datosCotizacion =  $this->modelo->traerCotizacionId($conexion,$id);
        $datosPlaca = $this->modeloPeritaje->buscarPlaca($conexion,$datosCotizacion[0]['placa']);
        $datosCliente0 = $this->modeloPeritaje->buscarCliente0Id($conexion,$datosPlaca['datos'][0]['propietario']);
        $datosEmpresa =  $this->modeloPeritaje->traerEmpresa($conexion);
        $this->vista->generarCorreoCotizacion($id,$datosCliente0,$datosCotizacion[0]['placa'],$datosEmpresa);
    }
    public function grabarVehiculo($conexion,$request){
        $idNuevoCarro = $this->modeloPeritaje->grabarVehiculo($conexion,$request);
        $this->buscarPlaca($conexion,$request['placa']);
    }
    public function nuevoPropietario(){
        $this->vistaPeritaje->nuevoPropietario();
    }
    public function grabarPropietario($conexion,$request){
        $id = $this->modeloPeritaje->grabarPropietario($conexion,$request);
        $this->vistaPeritaje->propietarioGrabado();
    }
    public function cargarUltimoPropietario($conexion){
        $maxId = $this->modeloPeritaje->traerMaxIdCLiente0($conexion);
        funciones::select_general_condicion('cliente0',$conexion,'idcliente','nombre' , $maxId);
    }
}

?>