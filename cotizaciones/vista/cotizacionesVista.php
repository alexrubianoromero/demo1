<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/funciones/funciones.class.php');

class cotizacionesVista{

    public function pantallaInicial($cotizaciones){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../css/bootstrap.min.css">  
                <link rel="stylesheet" href="../cotizaciones/css/cotizaciones.css">  
                <script src="https://kit.fontawesome.com/6f07c5d6ff.js" crossorigin="anonymous"></script>
                <title>Document</title>
            </head>
            <body bgcolor = "#c0c0c0">
                <div  id="div_peritajes" align="center" class="container linea " class="container" >
                    <br><br>
                    <div id="div_botones_peritaje" class="linea1">
                        <button onclick="nuevaCotizacion();" class="btn btn-primary">NUEVA COTIZACION</button>
                        <button onclick="consultaCotizacion();" class="btn btn-primary">TODOS</button>
                        <!-- <button onclick="enviarMenuPrincipal();" class="btn btn-primary">PRINCIPAL</button> -->
                        <a href=../menu_principal.php   class="btn btn-primary" role="button" class="btn btn-primary" >MENU PRINCIPAL</a>
                    </div>
                    <br>
                    <div id="div_resultados_peritajes">
                        <?php $this->mostrarCotizaciones($cotizaciones);?>
                    </div>
                </div>
                <?php  $this->modal(); ?>
                <?php  $this->modal1(); ?>
                <?php  $this->modal3(); ?>
                <?php  $this->modalItem(); ?>
                
            </body>
            </html>

            <script src = "../js/jquery-2.1.1.js"> </script>    
            <script src="../js/bootstrap.min.js"></script>
            <script src="../cotizaciones/js/cotizaciones.js"></script>
        <?php
    }
    public function modal (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Detalle Cotizacion</h4>
                  </div>
                  <div id="cuerpoModal" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }

    public function modal1 (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel1">Edicion Peritaje</h4>
                  </div>
                  <div id="cuerpoModal1" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modal3(){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel1">Propietario</h4>
                  </div>
                  <div id="cuerpoModal3" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function modalItem (){
        ?>
         <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
         Launch demo modal
         </button> -->
          <div class="modal fade" id="myModalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel1">Adicionar Item</h4>
                  </div>
                  <div id="cuerpoModalItem" class="modal-body">
                      
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                  </div>
              </div>
          </div>
        <?php
    }
    public function mostrarCotizaciones($cotizaciones){
       if($cotizaciones['filas']>0) 
        {
            $cotizaciones = $cotizaciones['datos']; 
            echo '<table class="table table-striped">';
            echo '<thead>';
                // $this->ponerTitulos($peritajes); 
            echo '<tr>';
            echo '<th>Id</th>'; 
            // echo '<th><i class="fas fa-edit"></i></th>'; 
            // echo '<th align="center"><i class="fas fa-print"></i></th>'; 
            // echo '<th align="center"><p class = "iconoPantalla"><i class="fas fa-file-pdf"></i></p></th>'; 
            echo '<th align="center">PDF</th>'; 
               
            echo '<th>Placa</th>';    
            echo '<th>Fecha</th>';    
            // echo '<th>Klm</th>';    
            // echo '<th>Observ</th>';    
            echo '</tr>';    
            echo '</thead>';
            echo '<tbody>';
                foreach($cotizaciones as $peri){
                    echo '<tr>';
                    echo '<td><button  onclick="muestreDetalleCotizacion('.$peri['id'].')" id="btnverperitaje" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">'.$peri['id'].'</button></td>';
                    // echo '<td><button  onclick="editarPeritaje('.$peri['id'].')"><i class="fas fa-edit" data-toggle="modal" data-target="#myModal1"></i></button></td>'; 
                    // echo '<td><button  onclick="imprimirPeritaje('.$peri['id'].')" ><i class="fas fa-edit" >Imp</button></td>'; 
                    // echo '<td align="center"><a target="_blanck" href="../peritajes/vista/imprimirPeritaje.php?id='.$peri['id'].' " class="btn btn-Primary"><i class="fas fa-print"></i></a>';
                    // echo '</td>'; 
                    echo '<td align="center">';
                    echo '<a  align="center" target="_blank" href="../cotizaciones/vista/pdfCotizacion.php?id='.$peri['id'].' " class="btn btn-Primary">
                    <p class = "iconoPantalla">
                        <i class="fas fa-file-pdf ">
                        </i>
                    </p>
                    </a>';
                    echo '</td>'; 
                    echo '<td>'.strtoupper($peri['placa']).'</td>'; 
                    echo '<td>'.$peri['fecha'] .'</td>'; 
                    // echo '<td>'.number_format($peri['klm'], 0, ',', '.').'</td>'; 
                    // echo '<td>'.$peri['observ'].'</td>'; 
                    echo '</tr>';
                }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'NO EXISTEN COTIZACIONES GRABADAS EN EL SISTEMA ';
        }        
    }

    public function pantallaDatosCotizacionId($datosCotizacion,$datosPlaca,$datosCliente0,$items)
    {
        $datosPlaca = $datosPlaca['datos'];
      //   $datosPeritaje = $datosPeritaje['datos'];
      //   echo '<pre>';
      //   print_r($datosPeritaje);
      //   echo '</pre>';
      //   die();
          ?>
           <div class="row">
              <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                 
                  <table class="table">
                  <tr>
                      <td>
                      <input type="hidden" id="idCarroPeritaje" value = "<?php  echo $datosPlaca[0]['idcarro']; ?>">
                          <label>Propietario:</label>
                      </td>
                      <td><?php   echo $datosCliente0['datos'][0]['nombre']; ?></td>
                  </tr>    
                  <tr>
                      <td><label>Marca:</label></td>
                      <td><?php   echo $datosPlaca[0]['marca']; ?></td>
                  </tr>    
                  <tr>
                      <td><label>Color:</label></td>
                      <td><?php   echo $datosPlaca[0]['color']; ?></td>
                  </tr>    
                  <tr>
                      <td><label>VenciSoat:</label></td>
                      <td><?php   echo $datosPlaca[0]['vencisoat']; ?></td>
                  </tr>    
                  
              </table>
              </div>
              <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
              <table class="table">
              <tr>
                  <td><label>Modelo:</label></td>
                  <td><?php   echo $datosPlaca[0]['modelo']; ?></td>
              </tr>    
              <tr>
                  <td><label>PLaca:</label></td>
                  <td><?php   echo $datosPlaca[0]['placa']; ?></td>
              </tr>    
           
              </table>
              </div>
          </div>
  
          <div class="row" id="div_puntos_peritaje">
              <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                  
              </div>  
              <!-- </div>
              <div class="row"> -->
              <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                 
              </div>  
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <table class="table">
                      <tr>
                          <td><label>Observaciones:</label></td>
                        </tr> 
                        <tr>
                            <td><textarea class="form-control" id="observacionesPeritaje" cols="70%" rows="2">
                                <?php echo $datosCotizacion[0]['observ']?>
                            </textarea></td>
                        </tr> 
                    </table>
                </div>
            </div>   

            <div class="row">
                <div id="div_items_cotizacion">
                    <?php   $this->mostrarItemsTemporal($items,'consulta'); ?>
                </div>
            </div> 

         <div id="divAvisosPeritaje"></div>
          <div class="row" align="center">
              <button onclick="correoCotizacion(<?php  echo $datosCotizacion[0]['id'] ?>);" id="correoPeritaje" class="btn btn-primary  btn-lg" >Enviar Correo Cotizacion</button>
          </div>
  
          <?php
    }

    public function nuevaCotizacion(){
        ?><div id="divPregunteDatos">
            <div id="divPreguntePlaca">
                <label>Placa</label>
                <input type="text" id="placaPeritaje" size="8" value="">
                <button onclick="buscarPlacaCotizacion();" id="btnBuscarPlaca">
                Verificar Placa
                <!-- <i class="fas fa-search"></i> -->
                </button>
            </div>
            <div id="divResultadobusqueda">
    
            </div>
        </div>
    
        <?
    }

    public function mostrarDatosPlaca($datosPlaca,$datosCliente0)
    {
        ?>
        <div class="row" class="linea">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
               
                <table class="table">
                <tr>
                    <td>
                    <input type="hidden" id="idCarroPeritaje" value = "<?php  echo $datosPlaca[0]['idcarro']; ?>">
                       <label> Propietario: </label>
                    </td>
                    <td><?php   echo $datosCliente0[0]['nombre']; ?></td>
                </tr>    
                <tr>
                    <td><label>Marca:</label></td>
                    <td><?php   echo $datosPlaca[0]['marca']; ?></td>
                </tr>    
                <tr>
                    <td><label>Color:</label></td>
                    <td><?php   echo $datosPlaca[0]['color']; ?></td>
                </tr>    
                <tr>
                    <td><label>VenciSoat:</label></td>
                    <td><?php   echo $datosPlaca[0]['vencisoat']; ?></td>
                </tr>    
                
            </table>
        </div>
        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
            <table class="table">
                <tr>
                    <td><label>Modelo:</label></td>
                    <td><?php   echo $datosPlaca[0]['modelo']; ?></td>
                </tr>    
                <tr>
                    <td><label>PLaca:</label></td>
                    <td><?php   echo $datosPlaca[0]['placa']; ?>
                        <input type="hidden" id="placaItem" value = "<?php   echo $datosPlaca[0]['placa']; ?>"  >
                    </td>
                </tr>    
                <!-- <tr>
                    <td><label>Kilometraje:</label></td>
                <td><input type="text" id="kilometrajeperitaje" size="8px" ></td>
            </tr>     -->
            </table>
            </div>
        </div>
        <div>

        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <tr>
                        <td><label>TRABAJO A COTIZAR</label></td>
                    </tr> 
                    <tr>
                        <td><textarea class="form-control" id="observacionesCotizacion" cols="70%" rows="2"></textarea></td>
                    </tr> 
                </table>
            </div>
        </div>   
        
        <div class="row">
            <button class="btn btn-primary "onclick="pedirInfoItem('<?php echo $datosPlaca[0]['placa'];  ?>');" data-toggle="modal" data-target="#myModalItem">
                   ADICIONAR ITEMS COTIZACION     <i class="fas fa-plus-square"></i>
            </button>
            <br><br>
        </div>    
        <div class="row">
            <div id="div_items_cotizacion">
            </div>
        </div>

        <div class="row">
            <!-- <button onclick="prueba();" class="btn btn-primary">Prueba</button> -->
            <button onclick="grabarCotizacion();" id="btnGrabarperitaje" class="btn btn-primary btn-block btn-lg">Grabar_Cotizacion</button>
        </div>
        <br><br>
        <?php
    }
    public function preguntarItemTemporal(){
          ?>
        
       <div class="row">
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Codigo</label></td>
                        <td><input type="text" size ="3px" id="codItem" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>Decripcion</label></td>
                        <td><input type="text"  id="descripItem" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>V. Unitario</label></td>
                        <td><input type="text"  id="vunitarioItem" class="form-control"></td>
                    </tr>
                    
                </table>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 linea">
                <table class="table">
                    <tr>
                        <td><label>Cantidad</label></td>
                        <td><input onchange="calcularTotalItem();" type="text"  id="canItem" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label>V Total</label></td>
                        <td><input type="text"  id="vtotalItem" class="form-control"></td>
                    </tr>
                
                    
                </table>
            </div>
        </div>    
        <div class="row">
            <button onclick="adicionarItem();" class="btn btn-primary btn-lg btn-block"  >ADICIONAR ITEM </button>
        </div>    

        <?php
    }
  public function mostrarItemsTemporal($itemsTemporal, $modo='editar' )
  {
        if($itemsTemporal['filas']>0)
        {
            $items = $itemsTemporal['datos']; 
            echo '<table class="table">'; 
            echo '<tr>';
            echo '<th>COD</th>';
            echo '<th>DESCRIP</th>';
            echo '<th>V.UNIT</th>';
            echo '<th>CAN</th>';
            echo '<th>TOTAL</th>';
            if($modo == 'editar'){
                echo '<th>DEL</th>';
            }
            $total = 0;
            echo '</tr>';
            foreach ($items as $item)
            {
                echo '<tr>';
                echo '<td>'.$item['codigo'].'</td>';
                echo '<td>'.$item['descripcion'].'</td>';    
                echo '<td>'.number_format($item['valor_unitario'], 0, ',', '.').'</td>';    
                echo '<td>'.$item['cantidad'].'</td>';    
                echo '<td align="right">'.number_format($item['total_item'], 0, ',', '.').'</td>';    
                echo '<td>';
                if($modo == 'editar'){ 
                ?>
                    <button onclick="eliminarItemTemporal('<?php echo $item['id_item']; ?>')" >
                    <i class="fas fa-trash"></i>
                    </button>
                <?php
                }
                $total += $item['total_item'];
                echo '</td>';    
                echo '</tr>';   
                
            }
            echo '<tr>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>Total</td>';
                echo '<td align="right">'.number_format($total, 0, ',', '.').'</td>';
            echo '</tr>';

            echo '</table>';
        }    
    }

    public function generarCorreoCotizacion($id,$datosCliente0,$placa,$datosEmpresa){
        if($datosEmpresa['resolucion']==''){
            echo 'Se debe configurar la carpeta del servidor en la tabla de empresa '; 
            die();
        }
        else{
            // echo '<pre>';
            // print_r($datosEmpresa);
            // echo '</pre>';
            // die();  

            $body = '

            '.strtoupper($datosEmpresa['razon_social']).'
            
            Te informa que el documento de tu COTIZACION lo puedes ver en el siguiente link

            Placa: '.strtoupper($placa).'  COTIZACION No: '.$id.'

            Puedes ver tu cotizacion en el siguiente link:

            https://www.alexrubiano.com/'.$datosEmpresa['resolucion'].'/pdfCotizacion/'.$id.'


            '.strtoupper($datosEmpresa['razon_social']).'
            Taller 
            
            O envianos un E-mail a '.$datosEmpresa['email_empresa'].'
            Recuerda, estamos ubicados en '.$datosEmpresa['direccion'].'';  


            $asunto = 'COTIZACION';
            $this->enviarCorreoPeritaje($body,$datosCliente0['datos'][0]['email'],$datosEmpresa,$asunto);

            echo '<p class="avisoazul">Se envio correo con la Cotizacion al email del cliente </p>';
        }    
    }
    public function enviarCorreoPeritaje($body,$email,$datosEmpresa,$asunto){
        // echo '<br>'.$headers;
        // echo '<br>'.$asunto;
        // echo '<br>'.$body;
        // echo 'email<br>'.$email;
        // die();
        
        $headers .= "From: ".$datosEmpresa['razon_social']." <ventas@alexrubiano.com>\r\n"; 
        mail($email,$asunto,$body,$headers); 
    }

  

}


?>