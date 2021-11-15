<?php
require_once('vista/PeritajesVista.php');
require_once('modelo/PeritajesModelo.php');
class PeritajesControlador{
    private $vista; 
    private $modelo;
    private $conexion;
   
    public function __construct($conexion){
        $this->conexion = $conexion;
        $this->vista = new peritajesVista();
        $this->modelo = new peritajesModelo();

        if(!isset($_REQUEST['opcion']) || $_REQUEST['opcion']=='consultar'){
            $this->pantallaInicial($this->conexion);
        }
        if($_REQUEST['opcion']=='nuevo'){

            $this->vista->nuevoPeritaje();
        } 
        if($_REQUEST['opcion']=='buscarPlaca'){

            $this->buscarPlaca($this->conexion,$_REQUEST['placa']);
        } 
        if($_REQUEST['opcion']=='grabar'){
        //          echo '<pre>';
        // print_r($_REQUEST);
        // echo '</pre>';
        // die();  
            $this->grabarPeritaje($this->conexion,$_REQUEST);
        } 
        if($_REQUEST['opcion']=='consultaPeritajeId'){
        //      echo '<pre>';
        // print_r($datosCliente0);
        // echo '</pre>';
        // die();   
            $this->consultaPeritajeId($conexion,$_REQUEST['id']);
        } 

    }  
    
    public function pantallaInicial($conexion){
        $peritajes = $this->modelo->traerPeritajes($conexion);
        $this->vista->pantallaInicial($peritajes);
    }
        

    // public function mostrarperitajes($conexion){
    //         $peritajes = $this->modelo->traerPeritajes($conexion);
    //         $this->vista->mostrarperitajes($peritajes);
    // }
    
    public function buscarPlaca($conexion,$placa){
        $datosPlaca = $this->modelo->buscarPlaca($conexion,$placa);
        if($datosPlaca['filas']>0){
            $datosCliente0 = $this->modelo->buscarCliente0Id($conexion,$datosPlaca['datos'][0]['propietario']);
            $this->vista->mostrarDatosPlaca($datosPlaca['datos'],$datosCliente0['datos']);
        }

        // echo '<pre>';
        // print_r($datosCliente0);
        // echo '</pre>';
        // die();
      
    }
    public function grabarPeritaje($conexion,$request){
        // echo '<pre>';
        // print_r($request);
        // echo '</pre>';
        // die();
        $this->modelo->grabarPeritaje($conexion,$request);
        $this->pantallaInicial($conexion);
    }

    public function consultaPeritajeId($conexion,$id){
        $datosPeritaje =  $this->modelo->traerPeritajeId($conexion,$id);
        // echo '<pre>';
        // print_r($datosPeritaje);
        // echo '</pre>';
        // die();
        $datosPlaca = $this->modelo->buscarPlaca($conexion,$datosPeritaje[0]['placa']);
        $datosCliente0 = $this->modelo->buscarCliente0Id($conexion,$datosPlaca['datos'][0]['propietario']);

        $this->vista->pantallaDatosPeritajeId($datosPeritaje,$datosPlaca,$datosCliente0);
    }
}


?>