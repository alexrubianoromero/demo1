<?php
require_once('../funciones/funciones.class.php');

class cotizacionesVista{


    public function pantallaInicial($peritajes){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">  
                <link rel="stylesheet" href="../peritajes/css/peritajes.css">  
                <script src="https://kit.fontawesome.com/6f07c5d6ff.js" crossorigin="anonymous"></script>
                <title>Document</title>
            </head>
            <body bgcolor = "#c0c0c0">
                <div id="div_peritajes" align="center" class="container linea " >
                    <br><br>
                    <div id="div_botones_peritaje" class="linea1">
                        <button onclick="nuevoPeritaje();" class="btn btn-primary">NUEVO</button>
                        <button onclick="consultaPeritaje();" class="btn btn-primary">PERITAJES</button>
                        <!-- <button onclick="enviarMenuPrincipal();" class="btn btn-primary">PRINCIPAL</button> -->
                        <a href=../menu_principal.php   class="btn btn-primary" role="button" class="btn btn-primary" >MENU PRINCIPAL</a>
                    </div>
                    <br>
                    <div id="div_resultados_peritajes">
                        <?php $this->mostrarPeritajes($peritajes);?>
                    </div>
                </div>
                <?php  $this->modal(); ?>
                <?php  $this->modal1(); ?>
                <?php  $this->modal3(); ?>
            </body>
            </html>

            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="js/peritajes.js"></script>
        <?php
    }


}



?>