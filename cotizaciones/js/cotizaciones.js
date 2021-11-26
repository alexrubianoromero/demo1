
function muestreDetalleCotizacion(id){
    
    var id = id;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
              console.log(this.responseText);
           document.getElementById("cuerpoModal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=consultaCotizacionId"
        +'&id='+id);

}

function nuevaCotizacion(){
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_resultados_peritajes").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=nuevo");
}

function buscarPlacaCotizacion(){
    var placa = document.getElementById("placaPeritaje").value;
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
			document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=buscarPlaca"+ "&placa="+placa);
}


function grabarCotizacion(){
    valida = validacionesCotizacion();
    if(valida != 0)
    {
        var idcarro = document.getElementById("idCarroPeritaje").value;
        var observaciones = document.getElementById("observacionesCotizacion").value;
        var placa = document.getElementById("placaPeritaje").value;
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_peritajes").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=grabarCotizacion"
        + "&idcarro="+idcarro
        + "&observaciones="+observaciones
        + "&placa="+placa
        );
    }
}


function validacionesCotizacion(){
    
    // if(document.getElementById("tacometro").value == 0)
    // {
        //    alert("Escoja estado tacometro") ;  
        //    document.getElementById("tacometro").focus();
        //    return false
        // }
        
    if(document.getElementById("observacionesCotizacion").value == '')
    {
       alert("Digite Observaciones") ;  
       document.getElementById("observacionesCotizacion").focus();
       return 0;
    }
  return 1;
}

function pedirInfoItem(placa){
    // alert(placa);
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
			document.getElementById("cuerpoModalItem").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=pedirInfoItem"+ "&placa="+placa);
}


function adicionarItem(){
    valida = validacionesAgregarItem();
    if(valida != 0)
    {
        $('#myModalItem').modal('hide');
        var placa = document.getElementById("placaItem").value;
        var codigo = document.getElementById("codItem").value;
        var descripcion  = document.getElementById("descripItem").value;
        var vunitarioItem  = document.getElementById("vunitarioItem").value;
        var cantidad  = document.getElementById("canItem").value;
        var vtotalItem  = document.getElementById("vtotalItem").value;
        
        const http=new XMLHttpRequest();
        const url = 'index.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("div_items_cotizacion").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=adicionarItem"
        + "&codigo="+codigo
        + "&descripcion="+descripcion
        + "&vunitarioItem="+vunitarioItem
        + "&cantidad="+cantidad
        + "&vtotalItem="+vtotalItem
        + "&placa="+placa
        );
    }    
}

function validacionesAgregarItem(){
    if(document.getElementById("codItem").value == '')
    {
       alert("Digite Codigo Item") ;  
       document.getElementById("codItem").focus();
       return 0;
    }
    if(document.getElementById("descripItem").value == '')
    {
       alert("Digite Descripcion Item") ;  
       document.getElementById("descripItem").focus();
       return 0;
    }
    if(document.getElementById("vunitarioItem").value == '')
    {
       alert("Digite Valor Unitario Item") ;  
       document.getElementById("vunitarioItem").focus();
       return 0;
    }
    if(document.getElementById("canItem").value == '')
    {
       alert("Digite Valor Cantidad Item") ;  
       document.getElementById("canItem").focus();
       return 0;
    }
    if(document.getElementById("vtotalItem").value == '')
    {
       alert("Digite Valor Total Item") ;  
       document.getElementById("vtotalItem").focus();
       return 0;
    }
  return 1;

}

function  eliminarItemTemporal(id_item){
    var placa = document.getElementById("placaItem").value;
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_items_cotizacion").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=eliminarItemTemporal"
    + "&id_item="+ id_item
    + "&placa="+ placa
    );
}

function calcularTotalItem(){
    var vunitarioItem  = document.getElementById("vunitarioItem").value;
    var cantidad  = document.getElementById("canItem").value;

    totalItem = parseInt(vunitarioItem)*parseInt(cantidad);
    var vtotalItem  = document.getElementById("vtotalItem").value = totalItem ;
}

function consultaCotizacion(){
    const http=new XMLHttpRequest();
	const url = 'index.php';
	http.onreadystatechange = function(){
		if(this.readyState == 4 && this.status ==200){
			console.log(this.responseText);
			document.getElementById("div_peritajes").innerHTML = this.responseText;
		}
	};
	http.open("POST",url);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send("opcion=consultar");
}


function correoCotizacion(id){
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("divAvisosPeritaje").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=generarCorreoCotizacion"
            + "&id="+id
             );

}

function grabarVehiculo()
{
     
     valida = validacionesCarro();
     if(valida != 0)
     { 
         // alert('pora aqui va ');
         var placa =  document.getElementById("placaPeritaje").value;
         var propietario =  document.getElementById("selectPropietario").value;
         var marca =  document.getElementById("marca").value;
         var linea =  document.getElementById("linea").value;
         var modelo =  document.getElementById("modelo").value;
         var color =  document.getElementById("color").value;
         var vencisoat =  document.getElementById("vencisoat").value;
         var revision =  document.getElementById("revision").value;
         var chasis =  document.getElementById("chasis").value;
         var motor =  document.getElementById("motor").value;

         const http=new XMLHttpRequest();
         const url = 'index.php';
         http.onreadystatechange = function(){
             if(this.readyState == 4 && this.status ==200){
                 console.log(this.responseText);
                 document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
             }
         };

         http.open("POST",url);
         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         http.send("opcion=grabarVehiculo1"
                 + "&placa="+placa
                 + "&propietario="+propietario
                 + "&marca="+marca
                 + "&linea="+linea
                 + "&modelo="+modelo
                 + "&vencisoat="+vencisoat
                 + "&revision="+revision
                 + "&chasis="+chasis
                 + "&motor="+motor
                 + "&color="+color
             );
             
     }
 }
 
function validacionesCarro()
{
    if(document.getElementById("placa").value == '')
    {
       alert("Digite placa") ;  
       document.getElementById("placa").focus();
       return 0;
    }
    if(document.getElementById("selectPropietario").value == 0)
    {
       alert("Escoja o cree propietario ") ;  
       document.getElementById("selectPropietario").focus();
       return false
    }
    if(document.getElementById("marca").value == 0)
    {
       alert("Digite marca ") ;  
       document.getElementById("marca").focus();
       return false
    }
    if(document.getElementById("linea").value == 0)
    {
       alert("Digite linea ") ;  
       document.getElementById("linea").focus();
       return false
    }
    if(document.getElementById("modelo").value == 0)
    {
       alert("Digite modelo ") ;  
       document.getElementById("modelo").focus();
       return false
    }
    if(document.getElementById("color").value == 0)
    {
       alert("Digite color ") ;  
       document.getElementById("color").focus();
       return false
    }
    return 1;
}
function btnNuevoPropietario(){
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModal3").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=nuevoPropietario"
        );
}


function grabarPrpietario()
{
     valida = validacionesPropietario();
     if(valida != 0)
     {
         var identi =  document.getElementById("identi").value;
         var nombre =  document.getElementById("nombre").value;
         var telefono =  document.getElementById("telefono").value;
         var direccion =  document.getElementById("direccion").value;
         var observaciones =  document.getElementById("observaciones").value;
         var email =  document.getElementById("email").value;
         const http=new XMLHttpRequest();
         const url = 'index.php';
         http.onreadystatechange = function(){
             if(this.readyState == 4 && this.status ==200){
                 console.log(this.responseText);
                 document.getElementById("cuerpoModal3").innerHTML = this.responseText;
             }
         };

         http.open("POST",url);
         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         http.send("opcion=grabarPropietario"
                     + "&identi="+identi
                     + "&nombre="+nombre
                     + "&telefono="+telefono
                     + "&direccion="+direccion
                     + "&observaciones="+observaciones
                     + "&email="+email
             );

             //aqui debe llamar otra funcion qque busque el ultimo cliente grabado y
             //lo deje seleccionado en el selec de propietario de la captura de datos de la moto
             setTimeout(function(){ 
             cargarSelectClienteId();
             },500);
             setTimeout(function(){ 
                 document.getElementById("marca").focus();
             },500);
     }     
 }


 function validacionesPropietario(){
    if(document.getElementById("identi").value == '')
    {
       alert("Digite Identidad") ;  
       document.getElementById("identi").focus();
       return 0;
    }
    if(document.getElementById("nombre").value == 0)
    {
       alert("Digite nombre ") ;  
       document.getElementById("nombre").focus();
       return false
    }
    if(document.getElementById("telefono").value == 0)
    {
       alert("Digite telefono ") ;  
       document.getElementById("telefono").focus();
       return false
    }
    if(document.getElementById("direccion").value == 0)
    {
       alert("Digite direccion ") ;  
       document.getElementById("direccion").focus();
       return false
    }
    if(document.getElementById("email").value == 0)
    {
       alert("Digite email  ") ;  
       document.getElementById("email").focus();
       return false
    }
    if(document.getElementById("observaciones").value == 0)
    {
       alert("Digite observaciones ") ;  
       document.getElementById("observaciones").focus();
       return false
    }
    return 1;
}
function cargarSelectClienteId(){
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("selectPropietario").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=cargarUltimoPropietario");   
}

