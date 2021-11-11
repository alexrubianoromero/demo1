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
}


?>