<?php
require_once('../funciones/funciones.class.php');

class CotizacionesControlador{
    private $modeloCoti;
    private $vistaCoti;
    private $conexion;

    
    public function __construct($conexion){
        $this->conexion = $conexion;
        
        if(!isset($_REQUEST['opcion']) || $_REQUEST['opcion']=='consultar'){
            $this->pantallaInicial($this->conexion);
        }

    }
   public function pantallaInicial($conexion){
        // $peritajes = $this->modelo->traerPeritajes($conexion);
        $this->vista->pantallaInicial($peritajes);
    }

    
}

?>